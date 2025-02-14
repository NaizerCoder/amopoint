$(document).ready(function () {

    const lineCtx = document.getElementById('lineChart').getContext('2d');
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    const objLineChart = new Chart(lineCtx, {
        type: 'line',
        data: {},
        options: {
            scales: {
                y: {
                    title: {
                        display: true, // Включаем отображение заголовка
                        text: 'Посещения', // Текст заголовка
                        font: {
                            size: 14, // Размер шрифта
                            weight: 'bold', // Жирный шрифт
                        }
                    },
                    ticks: {
                        stepSize: 1, // Шаг на оси Y
                    }
                },
                x: {
                    title: {
                        display: true, // Включаем отображение заголовка
                        text: 'Часы', // Текст заголовка
                        font: {
                            size: 14, // Размер шрифта
                            weight: 'bold', // Жирный шрифт
                        }
                    }
                }
            }
        }
    });

    const objPieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {},
    });

    async function getData(date) {
        try {
            const response = await $.get('script/getData.php', {date: date});
            return response;
        } catch (error) {
            console.error("Ошибка при выполнении запроса:", error);
        }
    }

    async function main(date) {
        let data = await getData(date);
        let lineData = {}
        let pieData = {}
        let hours = []
        let visitors = []
        let city = []
        let procent = []

        data = JSON.parse(data)

        /*данные для линейного графика*/
        data.linear_graph.forEach(item => {
            hours.push(item.hour)
            visitors.push(item.unique_visitors)
        })

        /*данные для круговой диаграммы*/
        data.pie_graph.forEach(item => {
            city.push(item.city)
            procent.push(item.percentage)
        })

        lineData = {
            labels: hours,
            datasets: [{
                label: 'Посещения',
                data: visitors,
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false,
            }]
        };

        pieData = {
            labels: city,
            datasets: [{
                data: procent,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            }]
        }

        objLineChart.data = lineData
        objPieChart.data = pieData
        objLineChart.update()
        objPieChart.update()

    }
    main();

    $('#sel_date').on('change', function () {
        let value_select = $(this).val() //получаем значение выбранного элемента Select
        main(value_select)

    })


});