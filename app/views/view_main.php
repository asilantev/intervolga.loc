<div class="alert alert-<?echo $_GET['error']=='none' ? 'success' : 'danger';
        echo is_null($_GET['error']) ? ' hidden' : '';?> alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <?
        echo $_GET['error'] != 'none' ? $_GET['error'] : 'Запись успешно добавлена';
    ?>
</div>
<div>
    <button id="show-form" class="btn btn-primary">Добавить страну</button>
    <form id="add-form" class="hidden" enctype="multipart/form-data" method="post"
          action="/main/add" onsubmit="return checkValidForm();">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <input name="country-name" type="text" class="form-control" placeholder="Название страны" autofocus>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <input name="capital-name" type="text" class="form-control" placeholder="Название столицы">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <input name="population" type="text" class="form-control" placeholder="Численность населения">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8"></div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <button type="submit" class="btn btn-success col-lg-6 col-md-6 col-sm-6 col-xs-12">Добавить</button>
                <button id="cancel" onclick="return false"
                        class="btn btn-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">Отмена</button>
            </div>
        </div>
    </form>
</div>
<div id="div-table">
    <table class="table table-fixed table-hover table-responsive">
        <thead>
        <tr>
            <th class="col-md-4">Название страны</th>
            <th class="col-md-4">Название столицы</th>
            <th class="col-md-4">Численность населения (чел.)</th>
        </tr>
        </thead>
        <tbody>
        <?
            foreach($data as $country)
            {
                echo '<tr>';
                echo '<td>'.htmlspecialchars($country[1]).'</td>';
                echo '<td>'.htmlspecialchars($country[2]).'</td>';
                echo '<td>'.htmlspecialchars(number_format($country[3], 0, '', ' ')).'</td>';
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>
</div>



