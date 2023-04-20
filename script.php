<?php

//verifichiamo che stiamo correttamente ricevendo la chiamata post da axios
if(isset($_POST['newTodo'])){

    // istruzioni per memorizzare il nuovo todo nel json
    
    // dobbiamo salvare il nuovo todo che riceviamo nel file json

    // prendiamo il json
    $todosJSON = file_get_contents('todos.json');
    
    // lo modifichiamo trasformandolo in un array php
    $todos = json_decode($todosJSON);
    
    // pushiamo
    $todos[] = $_POST['newTodo'];
    
    //convertiamo in json
    $newTodoJSON = json_encode($todos);

    // lo salviamo nel file
    file_put_contents('todos.json', $newTodoJSON);

} else{ 

// Prendiamo l'array dal file JSON e salvarlo in questa pagina in modo da poterlo 
// utilizzare e inviare tramite richieste API che verranno eseguite su questa pagina
    $stringaDelFile = file_get_contents('todos.json');

// trasformiamo questa stringa (che al momento contiene un oggetto json)
// in un array php
    $todos = json_decode($stringaDelFile);

//qui possiamo fare tutti i controlli che vogliamo

// Per visualizzare questa pagina come un vero e proprio JSON bisogna comunicargli che
// si tratta di un JSON. Possiamo farlo con header()
    header('Content-type: application/json');

// Per stampare l'array $students php in JSON possiamo utilizzare la funzione json_encode
    echo json_encode($todos);
}


