<!-- BEGIN: Vendor JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>


<script>

    let left = [];
    let right = [];
    //graph
    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
                name: 'LEFT',
                data: left,
            }, {
                name: 'RIGHT',
                data: right,
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false
                },
            },
            markers: {
                size: 4
            },
            colors: ['#4154f1', '#2eca6a'],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            xaxis: {
                type: 'datetime',
                categories: ["2021-12-05T00:00:00.000Z"]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            }
        }).render();
    });

    // UTC Server Time
    function display_c() {
        let refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
        let x = new Date();
        let utc_time = x.toUTCString();
        utc_time = utc_time.split(' ', 5).join(' ');
        document.getElementById('time').innerHTML = utc_time;
        display_c();
    }

    display_ct();
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        // var seconds = Math.f@ifr((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            // 'seconds': seconds
        };
    }
    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');

        // var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days + " days";
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2) + " Hrs & ";
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2) + " Min";
            // secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }
    function getNextSaturday() {
        var now = new Date();
        var nextSaturday = new Date();
        nextSaturday.setDate(now.getDate() + (6 + 2 - now.getDay() + 7) % 7 + 1);
        nextSaturday.setHours(23, 59, 0, 0);
        return nextSaturday;
    }
    function pad(number, length) {
        var str = "" + number
        while (str.length < length) {
            str = '0' + str
        }
        return str
    }
    function convertToEST(date) {
        // estOffset = new Date().getTimezoneOffset();
        var offset = new Date().getTimezoneOffset();
        offset = ((offset < 0 ? '+' : '-') + pad(parseInt(Math.abs(offset / 60)), 1) + pad(Math.abs(offset % 60), 1)) /
            10
        utc = date.getTime() + (date.getTimezoneOffset() * 60000);
        return new Date(utc + (3600000 * offset));
    }
    var deadline = getNextSaturday();
    initializeClock('clockdiv', convertToEST(deadline));

</script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": true,
            "dom": '<"pull-left"f><"pull-right"l>tip',
            order: [[1, 'desc']],
            scrollX: true
        });
    });
</script>