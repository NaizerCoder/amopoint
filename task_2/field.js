$(document).ready(function () {
    /*Т.к. в Select по умолчанию выбран первый Option (Тип 1), то отображаю поля соответствующие этому типу*/

    $('input[type=text]').css('display', 'none');
    $('input[type=text][name=input_1]').css('display', 'block');//убрать, если нет необходимости отображения по умолчанию

    $('input[type=button]').css('display', 'none');
    $('input[type=button][name=button_1]').css('display', 'block'); //убрать, если нет необходимости отображения по умолчанию

    $('select').on('change', function () {
        let value_select = $(this).val(); //получаем значение выбранного элемента Select

        $('input').css('display', 'none'); //скрыть все поля (очистка)

        /*TEXT*/
        $(`input[type=text][name=input_${value_select}]`).css('display', 'block');

        /*BUTTON*/
        $(`input[type=button][name=button_${value_select}]`).css('display', 'block');
    })

});