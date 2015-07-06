// enable tooltip
$('[data-toggle="tooltip"]').tooltip();


/**
 * Updates the dashboard panel sort orders
 * @param e
 * @param ui
 */
function dashboardSort(e, ui) {
    var sort = [];
    $('#dashboard-sortable').find('.dashboard').each(function () {
        sort.push(this.id);
    });
    $.post(dashboardSortUrl, {sort: sort});
}

/**
 * Updates the dashboard panel sort orders
 * @param e
 * @param ui
 */
function dashboardPanelSort(e, ui) {

    // update end parent
    var endParent = ui.endparent.attr('id');
    var endDashboardPanelSort = [];
    $('#' + endParent).find('.dashboard-panel').each(function () {
        endDashboardPanelSort.push(this.id);
    });
    $('#input-' + endParent).val(endDashboardPanelSort.toString());

    // update start parent
    var startParent = ui.startparent.attr('id');
    if (startParent != endParent) {
        var startDashboardPanelSort = [];
        $('#' + startParent).find('.dashboard-panel').each(function () {
            startDashboardPanelSort.push(this.id);
        });
        $('#input-' + startParent).val(startDashboardPanelSort.toString());
    }

    // trigger form change (see AskToSaveWork.php)
    formModified = true;

}

