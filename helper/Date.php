<?php

class Date
{
    public static function shw_date(string $date ,string  $separator = '-' ,  string $calendar = 'g2g' ) : string
    {
        $date = str_replace(['/', '-'], '-', $date);
        $parts = explode('-', $date);
        $result_date = '';
        if (count($parts) !== 3) {
            return '';
        }

        $year = (int) $parts[0];
        $month =(int) $parts[1];
        $day = (int)  $parts[2];
        if ($calendar == 'g2j' ){
            switch ($separator) {
                case '-':
                    $result_date =  gregorian_to_jalali($year, $month, $day,'-');
                    return $result_date ;
                case '/':
                    $result_date = gregorian_to_jalali($year, $month, $day,'/');
                    return $result_date;
            }
        }elseif ($calendar == 'j2g') {
            switch ($separator) {
                case '-':
                    $result_date = jalali_to_gregorian($year, $month, $day, '-');
                    return $result_date;
                case '/':
                    $result_date = jalali_to_gregorian($year, $month, $day, '/');
                    return  $result_date;
            }
        }elseif ($calendar == 'g2g') {
            switch ($separator) {
                case '-':
                    $result_date = $year . '-' . $month . '-' . $day;;
                    return $result_date;
                case '/':
                    $result_date = $year . '/' . $month . '/' . $day;
                    return $result_date;
            }
        }else{
            return '';
        }
        return $result_date;
    }

}