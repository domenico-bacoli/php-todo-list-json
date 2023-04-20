const { createApp } = Vue;

createApp({
    data() {
        return {
            todos: [],
            newTodo: '',
        }
    },

    methods: {
        //richiesta axios
        getTodo() {
            axios.get('./script.php').then(response => {
                this.todos = response.data;
            });
        },

        addTodo(){
               
            let data = {
                newTodo: '',
                status: false
            }

            data.newTodo = this.newTodo;
        
            // richiesta API al server dove chiediamo di aggiungere alla sua memoria
            // il nostro nuovo todo
            axios.post('./script.php', data, {headers: { 'Content-Type': 'multipart/form-data' } }).then(response => {

                //possiamo ricaricare i todo richiamando il methods todoInfo()
                this.getTodo();
            });

            // dopo aver inserito correttamente il todo, svuoto il campo di input 
            this.newTodo = "";
        },

        todoCheck(checkStatus) {
            if(checkStatus.status == "true"){
                checkStatus.status = "false";
            } else {
                checkStatus.status = "true";
            }
        },
    },

    mounted() {
        this.getTodo();
    },

}).mount('#app')
