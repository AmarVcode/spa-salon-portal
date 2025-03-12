<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
include "includecss.php";
?>
    <?php
include "includejs.php";
?>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.css" rel="stylesheet">

</head>

<body>

<?php
include "header.php";
?>
    <style>
    a {
        color: black;
        text-decoration: none;
    }

    .fc-daygrid-dot-event {
        display: grid;
        align-items: center;
        grid-template-columns: 100%;
    }

    .fc-daygrid-dot-event p {
        margin-top: 0;
        margin-bottom: 5px;
    }
    .container{
        margin-top: 50px;
    }
    
    </style>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: 'short'
            },
            events: 'fetch_events.php', // Fetch events dynamically
            eventContent: function(arg) {
               
                let title = `<span>${arg.event.title}</span>`;

                // Assign color based on status
                let status = arg.event.extendedProps.status; // Fetch status from PHP
                let bulletColor = "#FFC107"; // Default: Yellow (Pending)

                if (status === "completed") bulletColor = "#28A745"; // Green
                if (status === "cancelled") bulletColor = "#DC3545"; // Red
                let time = arg.timeText ?
                    `<b> <span style="display: inline-block; width: 10px; height: 10px; 
                          background-color: ${bulletColor}; border-radius: 50%; margin-right: 5px;"></span> ${arg.timeText}</b><br>` : "";

                return {
                    html: `${time} ${title}`
                };
            },
            eventDisplay: 'list-item', // Removes default background
        });

        calendar.render();
    });
    </script>

    <div class="container">
        <div id='calendar'></div>
    </div>
</body>

</html>