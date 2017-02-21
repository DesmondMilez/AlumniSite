$(document).ready(function () {
    window.AdminJobAdvert.init();
});

window.AdminJobAdvert = {
    init: function () {
        var container = $('#job-advert-table');
        container.DataTable(
            {
                ajax: {
                    "method": 'GET',
                    "url": route
                },
                columns: [
                    {"targets": 'id', "data": 'id'},
                    {"targets": 'subject', "data": 'subject'},
                    {"targets": 'techs', "data": 'techs'},
                    {"targets": 'actions', "data": 'actions'}
                ],
                language: {
                    "emptyTable": 'Нема Записи',
                    "info": 'Се прикажуваат од _START_ до _END_ од вкупно _TOTAL_ записи',
                    "infoEmpty": 'Нема записи',
                    "infoFiltered": '(пребарано од вкупно _MAX_ записи)',
                    "lengthMenu": 'Прикажи _MENU_ записи',
                    "loadingRecords": 'Се вчитува...',
                    "processing": 'Се процесира...',
                    "search": 'Пребарај',
                    "zeroRecords": 'Нема пронајдени записи',
                    "paginate": {
                        "fisrt": 'Прва',
                        "last": 'Последна',
                        "next": 'Следна',
                        "previous": 'Предходна'
                    },
                    "aria": {
                        "sortAscending": 'Подреди по растечки редослед',
                        "sortDescending": 'Подреди по опаѓачки редослед'
                    }
                }
            }
        );
    }
};