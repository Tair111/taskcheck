
const DEFAULT_LIMIT = 5;
var currentPage = 0;


function avatar_onMouseenter() {
    $(this).find('.avatar').css({
        'position': 'absolute',
        'border': '1px solid #010101'
    });
}
function avatar_onMouseleave() {
    $(this).find('.avatar').css({
        'position': 'inherit',
        'border': ''
    });
}

function FuncS(data, d) {
    var dbgText = $("#debugtext");
    var i;

    try {
        data = JSON.parse(data);
    } catch (err) { dbgText.html(err + '\n' + data); }

    // dbgText.html(data.status + '<br/>' + JSON.stringify(data.debug, null, 4));
    // dbgText.html(JSON.stringify(data, null, 4));

     if(data.status !== 'OK')
         return;

    function prep_str(str, color) {
        return '<span>' + str + '</span>'
    }

    // fill users page
    for (i in data.rows) {
        var row = data.rows[i];

        var fio = row.surname + ' ' + row.name + ' ' + row.middle_name;
        var age = (new Date()).getFullYear() - (new Date(Date.parse(row.birthdate))).getFullYear();
        // var age = (new Date(Date.now() - ;

        var tableRow = '';
        tableRow += '<td>' + row.id+ '</td>';
        if (row.foto)
            tableRow += '<td><div class="imgcontainer"><img class="avatar" src="upload/' + row.foto+ '"><div></td>';
        else
            tableRow += '<td><div class="imgcontainer"><img src="upload/no_image.png"><div></td>';
        tableRow += '<td><a href="#" onclick="return false;">' + fio + '</a></td>';
        tableRow += '<td>' + age + '</td>';
        if (row.gender === '1')
            tableRow += '<td><span class="gender_male">Муж.</span></td>';
        else
            tableRow += '<td><span class="gender_female">Жен.</span></td>';
        tableRow += '<td>' + '<a href="#" onclick="return false;">edit</a>' + ' ' + '<a href="#" onclick="return false;">del</a>' + '</td>';
        $("#table_searche").append("<tr>" + tableRow + "</tr>")
    }

    // create pages links
    var pagesHtml = '';
    var pagesCount = (parseInt(data.count) + DEFAULT_LIMIT - 1) / DEFAULT_LIMIT;
    for(i = 1; i <= pagesCount; i++) {
        if (i !== currentPage)
            pagesHtml += '<td><a href="" onclick="return getUsers(' + i + ')">' + i + '</a></td>';
        else
            pagesHtml += '<td><b>' + i + '</b></td>';
    }
    $("#table_pages").append('<tr>' + pagesHtml + '</tr>');

    var avatarSelector = $(".imgcontainer");
    avatarSelector.mouseenter(avatar_onMouseenter);
    avatarSelector.mouseleave(avatar_onMouseleave);
}


function getUsers(page){
    $("#table_searche").find("tr:gt(0)").remove();
    $("#table_pages").find("tr").remove();
    currentPage = page;

    var fio = $("input[name='fio']").val();
    var gender0 = $("input[name='gender0']").is(':checked');
    var gender1 = $("input[name='gender1']").is(':checked');
    var agefrom = $("input[name='agefrom']").val();
    var ageto = $("input[name='ageto']").val();

    var gender;
    if (gender0 === gender1)
        gender = undefined;
    else
        gender = !gender0;   // male = 1

    $.ajax({
        url: "action_search.php",
        type: "POST",
        data: ({fio: fio, gender: gender, agefrom: agefrom, ageto: ageto, page: page, limit: DEFAULT_LIMIT}),
        //dataType: "html",
        success: FuncS,
        error: function () {
            alert('error');
        }
    });
    return false;
}


$(document).ready(function() {
    $("#search_button").click(function() {return getUsers(1)});
});
