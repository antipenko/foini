/**
 * Created by vlad on 5/24/2017.
 */
$allOrders = $('#btnOrders');
$tabAllOrders = $('#orders');

$myOrders = $('#btnMyOrders');
$tabMyOrders = $('#myOrders');

$customers = $('#btnCustomers');
$tabCustomers = $('#customers');

$newOrder = $('#btnNewOrders');
$formNewOrder = $('#newOrder');

$newCustomer = $('#btnNewCustomer');
$formNewCustomer = $('#newCustomer');

function hideTable() {
    $tabAllOrders.addClass('hide');
    $tabMyOrders.addClass('hide');
    $tabCustomers.addClass('hide');
    $formNewOrder.addClass('hide');
    $formNewCustomer.addClass('hide');
    $allOrders.removeClass('active');
    $myOrders.removeClass('active');
    $customers.removeClass('active');
    $newOrder.removeClass('active');
    $newCustomer.removeClass('active');
}
$allOrders.click(function () {
    hideTable();
    $tabAllOrders.toggleClass('hide');
    $allOrders.toggleClass('active');
});

$myOrders.click(function () {
    hideTable();
    $tabMyOrders.toggleClass('hide');
    $myOrders.toggleClass('active');
});

$customers.click(function () {
    hideTable();
    $tabCustomers.toggleClass('hide');
    $customers.toggleClass('active');
});

$newOrder.click(function () {
    hideTable();
    $formNewOrder.toggleClass('hide');
    $newOrder.toggleClass('active');
});

$newCustomer.click(function () {
    hideTable();
    $formNewCustomer.toggleClass('hide');
    $newCustomer.toggleClass('active');
});

var grid = document.getElementById('grid');

grid.onclick = function(e) {
    if (e.target.tagName != 'TH') return;

    // Если TH -- сортируем
    sortGrid(e.target.cellIndex, e.target.getAttribute('data-type'));
};

function sortGrid(colNum, type) {
    var tbody = grid.getElementsByTagName('tbody')[0];

    // Составить массив из TR
    var rowsArray = [].slice.call(tbody.rows);

    // определить функцию сравнения, в зависимости от типа
    var compare;

    switch (type) {
        case 'number':
            compare = function(rowA, rowB) {
                return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
            };
            break;
        case 'string':
            compare = function(rowA, rowB) {
                return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? 1 : -1;
            };
            break;
    }

    // сортировать
    rowsArray.sort(compare);

    // Убрать tbody из большого DOM документа для лучшей производительности
    grid.removeChild(tbody);

    // добавить результат в нужном порядке в TBODY
    // они автоматически будут убраны со старых мест и вставлены в правильном порядке
    for (var i = 0; i < rowsArray.length; i++) {
        tbody.appendChild(rowsArray[i]);
    }

    grid.appendChild(tbody);

}