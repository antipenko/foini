/**
 * Created by vlad on 5/24/2017.
 */
$allOrders = $('#btnOrders');
$tabAllOrders = $('#orders');
$myOrders = $('#btnMyOrders');
$tabMyOrders = $('#myOrders')

$allOrders.click(function () {
    $tabAllOrders.toggleClass('hide');
});
$myOrders.click(function () {
    $tabMyOrders.toggleClass('hide');
});