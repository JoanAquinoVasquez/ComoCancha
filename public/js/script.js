var contador;
function calificar(item){
    console.log(item)
    contador = item.id[0]; //captura el primer caracter
    let nombre = item.id.substring(1); //captura todo menos el primer caracter
    for(let i=0; i<5; i++){
        if(i<contador){
            document.getElementById((i+1)+nombre).style.color = "orange";
        } else {
            document.getElementById((i+1)+nombre).style.color = "white";
        }
    }
}

var monthName = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", 
"Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
var now = new Date();
var day = now.getDate();
var currentMonth = now.getMonth();
var month = currentMonth;
var year = now.getFullYear();
//var selectedDate = null;

initCalendar();

$("#next_month").click(function(){
    getNextMonth();
});

$("#last_month").click(function(){
    getPrevMonth();
});

function initCalendar(){
    $("#text_day").text(day);
    $("#text_month").text(monthName[currentMonth]);
    $("#text_month_02").text(monthName[month]);
    $("#text_year").text(year);

    $(".item_day").remove();

    for(let i = startDay(); i > 0; i--){
        $(".container_days").append(
            `<span class="week_days_item item_day prev_days">${getTotalDays(month - 1) - (i - 1)}</span>`
        );
    }
    
    // Días del mes actual
    for(let i = 1; i <= getTotalDays(month); i++){
        if(i === day && month === now.getMonth() && year === now.getFullYear()){
            $(".container_days").append(
                `<span class="week_days_item item_day today">${i}</span>`
            );
        } else {
            $(".container_days").append(
                `<span class="week_days_item item_day">${i}</span>`
            );
        }
    }

    // Días del mes siguiente
    let nextMonthDays = 7 - ($(".container_days").children().length % 7);
    if(nextMonthDays < 7){
        for(let i = 1; i <= nextMonthDays; i++){
            $(".container_days").append(
                `<span class="week_days_item item_day next_days prev_days">${i}</span>`
            );
        }
    }

    // Al final de la función initCalendar, se añade esto para hacer que los días sean clicables
    $(".container_days").on("click", ".item_day", function() {
        // Remover la clase 'selected_day' de todos los días
        $(".item_day").removeClass("selected_day");
        
        // Añadir la clase 'selected_day' al día seleccionado
        $(this).addClass("selected_day");s
    });

}

function getNextMonth(){
    if(month !== 11){
        month++;
    } else {
        month = 0;
        year++;
    }
    initCalendar();
}

function getPrevMonth(){
    if(month !== 0){
        month--;
    } else {
        month = 11;
        year--;
    }
    initCalendar();
}

function startDay(){
    var start = new Date(year, month, 1);
    return start.getDay();
}

function leapYear(){
    return((year % 400 === 0) || (year % 4 === 0 && year % 100 !== 0));
}

function getTotalDays(month){
    if(month === -1) month = 11;

    switch(month){
        case 0: case 2: case 4: case 6: case 7: case 9: case 11:
            return 31;
        case 3: case 5: case 8: case 10:
            return 30;
        case 1:
            return leapYear() ? 29 : 28;
    }
}


