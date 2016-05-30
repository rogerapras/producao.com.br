$(document).ready(function () {
    $(".data").mask("99/99/9999");
    $.datepicker.setDefaults({
        defaultDate: null,
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: 'dd/mm/yy'
    });
    $("#data_inicial").datepicker({
        onClose: function (selectedDate) {
            $("#data_final").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#data_final").datepicker({
        onClose: function (selectedDate) {
            $("#data_inicial").datepicker("option", "maxDate", selectedDate);
        }
    });
    $("#data_inicial_evento").datepicker({
        onClose: function (selectedDate) {
            $("#data_final_evento").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#data_final_evento").datepicker({
        onClose: function (selectedDate) {
            $("#data_inicial_evento").datepicker("option", "maxDate", selectedDate);
        }
    });
    $("#data_inicial_resumo").datepicker({
        onClose: function (selectedDate) {
            $("#data_final_resumo").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#data_final_resumo").datepicker({
        onClose: function (selectedDate) {
            $("#data_inicial_resumo").datepicker("option", "maxDate", selectedDate);
        }
    }); 
    
});
var dashboard = new function () {
            this.event = new function () {
                this.reload = function () {
                    $.ajax({
                        type: "POST",
                        data: {
                            "idProjeto": $("#idProjeto_event").val(),
                            "dt_ini": $("#data_inicial_resumo").val(),
                            "dt_fin": $("#data_final_resumo").val()
                        },
                        url: "/dashboard/reloadDataEvent/",
                        dataType: "json",
                        async: false,
                        success: function (dataReturn) {
                            $("#data_event").html(dataReturn);
                        }
                    });
                };
                this.filtraGrafico = function () {
                    if (this.validate('evento')) {
                        $.ajax({
                            type: "POST",
                            data: {
                                "idProjeto": $("#idProjeto_event").val(),
                                "dt_ini": $("#data_inicial_evento").val(),
                                "dt_fin": $("#data_final_evento").val()
                            },
                            url: "/dashboard/reloadGraficoEvent/",
                            dataType: "json",
                            async: false,
                            success: function (dataReturn) {
                                $("#div-event-chart").html(dataReturn);
                            }
                        });
                    }
                };
                this.validate = function (tipo) {
                    var status = true;
                    var error = '';

                    if ($("#data_inicial_" + tipo).val() === "" && $("#data_final_" + tipo).val() === "") {
                        error += "Insira um periodo<br />";
                        status = false;
                    } else {
                        if ($("#data_inicial_" + tipo).val() === "") {
                            error += "Insira uma data inicial<br />";
                            status = false;
                        }
                        if ($("#data_final_" + tipo).val() === "") {
                            error += "Insira uma data final<br />";
                            status = false;
                        }
                    }

                    if (!status) {
                        showMessage(error);
                    }
                    return status;
                };
            };
            this.troca = new function () {
                this.reload = function () {
                    if (this.validate()) {
                        $.ajax({
                            type: "POST",
                            data: {
                                "idProjeto": $("#idProjeto_troca").val(),
                                "dt_ini": $("#data_inicial").val(),
                                "dt_fin": $("#data_final").val()
                            },
                            url: "/dashboard/reloadDataTroca/",
                            dataType: "json",
                            async: false,
                            success: function (dataReturn) {
                                $("#data_troca").html(dataReturn);
                            }
                        });
                    }
                };
                this.validate = function () {
                    var status = true;
                    var error = '';

                    if ($("#data_inicial").val() === "" && $("#data_final").val() === "") {
                        error += "Insira um periodo<br />";
                        status = false;
                    } else {
                        if ($("#data_inicial").val() === "") {
                            error += "Insira uma data inicial<br />";
                            status = false;
                        }
                        if ($("#data_final").val() === "") {
                            error += "Insira uma data final<br />";
                            status = false;
                        }
                    }

                    if (!status) {
                        showMessage(error);
                    }
                    return status;
                };
            };
        };
