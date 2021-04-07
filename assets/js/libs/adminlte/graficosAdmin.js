$(document).ready(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    let cantMasculino = $('#masculino').attr('data-cantidad');
    let cantFemenino = $('#femenino').attr('data-cantidad');
    let cantOtro = $('#otro').attr('data-cantidad');
    var donutData = {
        labels: [
            'Femenino',
            'Masculino',
            'Otro',
        ],
        datasets: [
            {
                data: [cantFemenino, cantMasculino, cantOtro],
                backgroundColor: ['#C533FF', '#0D34E9', '#1AB648',],
            }
        ]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })
})