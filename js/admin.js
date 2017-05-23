/**
 * Created by vlad on 5/24/2017.
 */
$allOrders = $('#btnOrders');
$tabAllOrders = $('#orders');

$myOrders = $('#btnMyOrders');
$tabMyOrders = $('#myOrders');

$customers = $('#btnCustomers');
$tabCustomers = $('#customers')

$allOrders.click(function () {
    $tabAllOrders.toggleClass('hide');
});

$myOrders.click(function () {
    $tabMyOrders.toggleClass('hide');
});

$customers.click(function () {
    $tabCustomers.toggleClass('hide');
});