import "./bootstrap";

import Datepicker from "flowbite-datepicker/Datepicker";

const datepickerEl = document.getElementById("datepickerId");
if (datepickerEl !== null) {
    new Datepicker(datepickerEl, {
        format: "yyyy-mm-dd",
    });
}

import DateRangePicker from "flowbite-datepicker/DateRangePicker";

const dateRangePickerEl = document.getElementById("dateRangePickerId");
new DateRangePicker(dateRangePickerEl, {
    format: "yyyy-mm-dd",
});
