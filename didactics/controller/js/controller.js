function addTry() {
    $.post("addTry.php", {}).done(function (data) {
        console.log("New try inserted:");
        console.log(data);
    });
}