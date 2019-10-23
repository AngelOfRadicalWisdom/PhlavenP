
<script>
function _(id){
   return document.getElementById(id);	
}
var droppedIn = false;
function drag_start(event) {
    event.dataTransfer.dropEffect = "move";
    event.dataTransfer.setData("text", event.target.getAttribute('id') );
}
function drag_drop(event) {
    event.preventDefault(); /* Prevent undesirable default behavior while dropping */
    var elem_id = event.dataTransfer.getData("text");
    event.target.appendChild( _(elem_id) );
    _(elem_id).removeAttribute("draggable");
    _(elem_id).style.cursor = "default";
    droppedIn = true;
    var thisnode = event.target.getAttribute('id');

    if(thisnode === "1st node"){
    $(".1stnode").val(elem_id);}

    if(thisnode === "2nd node"){
    $(".2ndnode").val(elem_id);}

    if(thisnode === "3rd node"){
    $(".3rdnode").val(elem_id);}

    if(thisnode=== "4th node"){
    $(".4thnode").val(elem_id);}

    if(thisnode === "5th node"){
    $(".5thnode").val(elem_id);}

    if(thisnode === "6th node"){
    $(".6thnode").val(elem_id);}
    
    if(thisnode === "7th node"){
    $(".7thnode").val(elem_id);}

    if(thisnode === "8th node"){
    $(".8thnode").val(elem_id);}

    if(thisnode === "9th node"){
    $(".9thnode").val(elem_id);}
}

function readDropZone(){
    for(var i=0; i < _("drop_zone").children.length; i++){
        alert(_("drop_zone").children[i].id+" is in the drop zone");
    }
    /* Run Ajax request to pass any data to your server */
}
</script>