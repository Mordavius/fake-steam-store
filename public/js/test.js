$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var searchbox = document.getElementById('searchbar');
var searchresult = document.getElementById('searchresult');
var actualData;

searchbox.oninput = function() {
    $.ajax({
        type:'POST',
        url:'/games/ajax',
        data: {char: searchbox.value},
        //data:'_token = <?php echo csrf_token() ?>',
        success: function(data) {
            searchresult.innerHTML = null;
            var ul=document.createElement('ul');
            searchresult.appendChild(ul);
            actualData = data.msg ? data.msg : data;

            $.each(actualData, function (index, data) {
                if (data.name && data.description) {
                    var li=document.createElement('li');
                    ul.appendChild(li);
                    li.innerHTML += data.name;
                    li.innerHTML += "<br />";
                    li.innerHTML += data.description;
                }
                li.className += "list-group-item";
            });
            ul.className += "list-group";
            //console.log(actualData);
            //actualData.each();
        }
    });
}