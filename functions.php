<?php
function onSave() {
    //print_r($_POST["note"]);
    saveToFile($_POST['note']);
}

function saveToFile($note){
    $notesArray=[];
    $notesArray[] = $note;
    $jsonNotes = json_encode($notesArray);

    file_put_contents("./notes.json", $jsonNotes);
}
?>