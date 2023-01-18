<?php

class flasher
{

    public static function setFlash($pesan, $tipe)
    {
        $pesan = str_replace('-', " ", $pesan);
        return  '<div class="notyf" data="' . $pesan . '" type="' . $tipe . '"></div>';
    }

    public static function input($data, string $column, string  $type = "text", $hidden = "", string $required = "required",  string $disabled = "",  array $option = [], $checked = "")
    {
        if ($type == "select") {

            $op = "";

            foreach ($option as $key => $value) {

                if ($value == $data) $op .= "<option value='$value' selected>" . ucwords($key) . "</option>";
                else    $op .= "<option value='$value'>" . ucwords($key) . "</option>";
            }
            $input =
                "<div class='input-group'>
                    <span class='input-group-text'>" . ucwords(str_replace("_", " ", $column)) . "</span>
                    <select class='form-control extend-toggle ' data-live-search='true' name='$column' $disabled $required>
                        <option value=''>-- Pilih " . ucwords(str_replace("_", " ", $column)) . " </option>
                        $op
                    </select>
                </div>";
        } elseif ($type == "checkbox" || $type == "radio") {
            $input =
                "<div class='form-check form-check-inline'>
                <input class='form-check-input' type='$type' name='$column' value='$data' $checked>
                <label class='form-check-label'>" . ucwords(str_replace("_", " ", $column)) . "</label>
            </div>";
        } elseif (!empty($hidden)) {
            $input = "<input  type='$type' name='$column' value='$data' $hidden>";
        } else {
            $input = "
            <div class='input-group'>
                <span class='input-group-text'>" . ucwords(str_replace("_", " ", $column)) . "</span>
                <input class='form-control' value='$data' type='$type' name='$column' $required $disabled>
            </div>";
        }

        return $input;
    }

    public static     function last_date ($date)
    {
        return  date("Y-m-t", strtotime($date));
    }

    public static    function dateDiff($datetime1, $datetime2)
    {

        $datetime1 = date_create($datetime1);
        $datetime2 = date_create($datetime2);

        // calculates the difference between DateTime objects
        $interval = date_diff($datetime1, $datetime2);

        return $interval;
    }
}
