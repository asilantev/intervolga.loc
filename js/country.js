$(document).ready(function() {
    if(!$(".alert").hasClass('hidden'))
    {
        //редирект на главную через 3 секунды
        window.setTimeout(function() {
            document.location.href = '/';
        }, 3000);
    }
    //при закрытии alert'a
    $('.close').click(function() {
        document.location.href = '/';
    });
    //открываем форму добавления новой записи
    $("#show-form").click(function() {
        $("#add-form").removeClass("hidden");
        $(this).addClass("hidden");
    });
    //закрываем форму добавления новой записи
    $("#cancel").click(function() {
        $("#add-form").addClass("hidden");
        $("#show-form").removeClass("hidden");
    });
});
//проверка на валидность страны и столицы
function checkWord(e, valid)
{
    var reWord = /^[а-яА-ЯёЁ ]+$/;
    if(!reWord.test(e.val()))
    {
        e.css("border-color", "red");
        return false;
    }
    else
    {
        e.css("border-color", "#ccc");
        return valid ? true : false; //если хотя бы одно поле формы не валидно - false
    }
}
//проверка формы на валидность
function checkValidForm()
{
    var bValid = true;
    bValid = checkWord($("#country-name"), bValid);
    bValid = checkWord($("#capital-name"), bValid);
    var population = $("#population").val().trim();
    population = population.replace(' ','');
    //проверка поля на пустоту и буквенных значений
    if (population==""||isNaN(population))
    {
        $("#population").css("border-color", "red");
        bValid = false;
    }
    else
        $("#population").css("border-color", "#ccc");
    return bValid;
}

