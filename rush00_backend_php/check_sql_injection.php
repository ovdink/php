<?php

    function check_sql_injection($field)
    {
        if (is_numeric($field))
            return TRUE;
        else {
            $field = strtoupper($field);
            if (strstr($field, "DROP "))
                return FALSE;
            if (strstr($field, "SELECT "))
                return FALSE;
            if (strstr($field, "INSERT "))
                return FALSE;
            if (strstr($field, "UPDATE "))
                return FALSE;
            if (strstr($field, "UPDATE "))
                return FALSE;
            if (strstr($field, "EXEC "))
                return FALSE;
        }
    }

?>