<?php
function onSave() {
    //print_r($_POST["note"]);
    saveToFile($_POST['note']);
}
//Her bliver det encoded og postet i notes.json
function saveToFile($note){
    $notesArray= getFromFile();
    $notesArray[] = $note;
    $jsonNotes = json_encode($notesArray);

    file_put_contents("./notes.json", $jsonNotes);
}
//Her hentes det fra json og decodes til et array
function getFromFile(){
    $jsonNotes = file_get_contents("./notes.json");
    $notesArray = json_decode($jsonNotes, true);
    return $notesArray;
}

function deleteButton(){
    $notesArray = getFromFile();
    unset ($notesArray[$_GET["indeks"]]); 
    $jsonNotes = json_encode($notesArray);

    file_put_contents("./notes.json", $jsonNotes);
    header("location:http://localhost:8888/deep-notes/");
}
?>