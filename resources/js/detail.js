$("#delete-button").click(function () {
    if(confirm($("#name").text() + " を削除します。よろしいですか？")){
        location.href="gear/delete/" + $("#id").val();
    }
    else{
        return false;
    }
});

