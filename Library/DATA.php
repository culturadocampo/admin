<?php

class DATA {

    public static function mysql_to_date($date) {
        return date("d/m/Y", strtotime($date));
    }

    public static function mysql_to_time($datex) {
        $hora_x = substr($datex, 11, 2);
        $minuto_x = substr($datex, 14, 2);
        $segundo_x = substr($datex, 17, 2);
        $date_new = "$hora_x:$minuto_x:$segundo_x";

        return $date_new;
    }

    public static function date_to_mysql($date) {
        $explode = explode("/", $date);

        return date('Y-m-d', strtotime($explode[2] . "-" . $explode[1] . "-" . $explode[0]));
    }

    public static function mysql_to_datetime($date) {
        if ($date) {
            return date("d/m/Y H:i:s", strtotime($date));
        } else {
            return false;
        }
    }

    public static function datetime_to_mysql($date) {
        return date('Y-m-d H:i:s', strtotime(str_replace("/", "-", $date)));
    }

    public static function now() {
        return date("d/m/Y H:i:s");
    }

    public static function now_mysql() {
        return date("Y-m-d H:i:s");
    }

    public static function last_moment_month() {
        return date("Y-m-t 23:59:59", strtotime("-1 month"));
    }

    public static function today() {
        return date("d/m/Y");
    }

    public static function today_mysql() {
        return date("Y-m-d");
    }

    public static function get_new_date($diff_days = 0, $mysql_format = false, $initial_date = false) {
        if ($initial_date) {
            $time = strtotime($initial_date . " $diff_days days");
        } else {
            $time = strtotime(date("Y-m-d") . " $diff_days days");
        }

        return $mysql_format ? date("Y-m-d", $time) : date("d/m/Y", $time);
    }

    public static function get_new_date_payment($diff_days = 0, $mysql_format = false, $initial_date = false) {
        return self::get_new_date_payment2($diff_days, $mysql_format, $initial_date);
        $PAYMENT_DAY = 21;
        if ($initial_date) {
            $time = strtotime($initial_date . " {$diff_days} days");
        } else {
            $time = strtotime(date("Y-m-d") . " {$diff_days} days");
        }
        /* GO TO NEXT PAYMENT DAY */ {
            $dayx = date("d", $time);
            if ($dayx < $PAYMENT_DAY) {
                $dayx = ( $PAYMENT_DAY - $dayx );
                $time = strtotime(date("Y-m-d", $time) . " +$dayx days");
            } else {
                $time = strtotime(date("Y-m-21", $time) . " +1 month");
            }
        }

        return $mysql_format ? date("Y-m-d", $time) : date("d/m/Y", $time);
    }

    public static function get_new_date_payment2($diff_days = 0, $mysql_format = false, $initial_date = false) {
        $time = strtotime(date("Y-m-21") . " +1 month");

        return $mysql_format ? date("Y-m-d", $time) : date("d/m/Y", $time);
    }

    public static function get_new_date_time($diff_days = 0, $mysql_format = false) {
        $time = strtotime(date("Y-m-d H:i:s") . " $diff_days days");

        return $mysql_format ? date("Y-m-d H:i:s", $time) : date("d/m/Y H:i:s", $time);
    }

    public static function get_new_date_month($diff_month = 0, $initial_date = false /* MYSQL FORMAT */, $mysql_format = false) {
        if (!$initial_date) {
            $initial_date = date("Y-m-d");
        }
        $time = strtotime($initial_date . " $diff_month months");

        return $mysql_format ? date("Y-m-d", $time) : date("d/m/Y", $time);
    }

    public static function get_new_date_month_full($diff_month = 0, $initial_date = false /* MYSQL FORMAT */, $mysql_format = false) {
        if (!$initial_date) {
            $initial_date = date("Y-m-d");
        }
        $time = strtotime($initial_date . " $diff_month months");

        return $mysql_format ? date("Y-m-01", $time) : date("d/m/Y", $time);
    }

    public static function get_date_diff_days($start /* USE MYSQL FORMAT */, $end /* USE MYSQL FORMAT */) {
        $start_time = strtotime($start);
        $end_time = strtotime($end);

        return ( ( $end_time - $start_time ) / 86400 );
    }

    public static function get_date_diff_days_int($start /* USE MYSQL FORMAT */, $end /* USE MYSQL FORMAT */) {
        $start_time = strtotime($start);
        $end_time = strtotime($end);

        return ceil(( $end_time - $start_time ) / 86400);
    }

    public static function get_past_time_days($start /* Y-m-d H:i:s */, $end = false) {
        $start_time = strtotime($start);
        if ($end) {
            $end_time = strtotime($end);
        } else {
            $end_time = time();
        }
        $diff = ( $start_time - $end_time );

        return round(( $diff / 86400), 2);
    }

    public static function get_past_time_from_now_ext($datetime /* Y-m-d H:i:s */, $aprox = 1) {
        $diff_seconds = self::get_past_time_seconds($datetime);

        return self::get_diff_obj($diff_seconds, false);
    }

    public static function get_past_time_seconds($start /* Y-m-d H:i:s */, $end = false) {
        $start_time = strtotime($start);
        if ($end) {
            $end_time = strtotime($end);
        } else {
            $end_time = time();
        }
        $diff = ( $start_time - $end_time );

        return $diff;
    }

    public static function get_diff_obj($seconds, $somente_tempo, $aprox = 1) {
        $tempo = "";
        if ($seconds < -500000000) {
            return "Nunca";
        }
        if ($seconds > 0) {
            if ($seconds > 60) {
                $minuto = ( $seconds / 60 );
                if ($minuto >= 60) {
                    $hora = ( $seconds / 3600 );
                    if ($hora >= 24) {
                        $dia = $seconds / 86400;
                        if ($dia >= 30) {
                            $mes = ( $seconds / 2592000 );
                            if ($mes > 12) {
                                $ano = ( $seconds / 31104000 );
                                $tempo .= $somente_tempo ? "" : "Há ";
                                $tempo .= round($ano, $aprox) . " ano(s).";
                            } else {
                                $tempo .= $somente_tempo ? "" : "Em ";
                                $tempo .= round($mes, $aprox) . " mês(es).";
                            }
                            if ($dia > 15000) {
                                $tempo = "";
                            }
                        } else {
                            $tempo .= $somente_tempo ? "" : "Em ";
                            $tempo .= round($dia, $aprox) . " dia(s).";
                        }
                    } else {
                        $tempo .= $somente_tempo ? "" : "Em ";
                        $tempo .= round($hora, $aprox) . " hora(s).";
                    }
                } else {
                    $tempo .= $somente_tempo ? "" : "Em ";
                    $tempo .= round($minuto, $aprox) . " minuto(s).";
                }
            } else {
                $tempo .= $somente_tempo ? "" : "Em ";
                $tempo .= round($seconds, $aprox) . " segundo(s).";
            }
        } else if ($seconds < 0) {
            $seconds *= -1;
            if ($seconds > 60) {
                $minuto = ( $seconds / 60 );
                if ($minuto >= 60) {
                    $hora = ( $seconds / 3600 );
                    if ($hora >= 24) {
                        $dia = ( $seconds / 86400 );
                        if ($dia > 15000) {
                            $tempo = "";
                        } else {
                            if ($dia >= 30) {
                                $mes = ( $seconds / 2592000 );
                                if ($mes > 12) {
                                    $ano = ( $seconds / 31104000 );
                                    $tempo .= $somente_tempo ? "" : "Há ";
                                    $tempo .= round($ano, $aprox) . " ano(s).";
                                } else {
                                    $tempo .= $somente_tempo ? "" : "Há ";
                                    $tempo .= round($mes, $aprox) . " mês(es).";
                                }
                            } else {
                                $tempo .= $somente_tempo ? "" : "Há ";
                                $tempo .= round($dia, $aprox) . " dia(s).";
                            }
                        }
                    } else {
                        $tempo .= $somente_tempo ? "" : "Há ";
                        $tempo .= round($hora, $aprox) . " hora(s).";
                    }
                } else {
                    $tempo .= $somente_tempo ? "" : "Há ";
                    $tempo .= round($minuto, $aprox) . " minuto(s).";
                }
            } else {
                $tempo .= $somente_tempo ? "" : "Há ";
                $tempo .= round($seconds, $aprox) . " segundo(s).";
            }
        } else {
            $tempo = "0 segundo(s).";
        }

        return $tempo;
    }

    public static function get_past_time_from_now_ext_no_aprox($datetime /* Y-m-d H:i:s */) {
        $diff_seconds = self::get_past_time_seconds($datetime);

        return self::get_diff_obj($diff_seconds, true, 0);
    }

    public static function get_past_time_from_dates_ext($start /* Y-m-d H:i:s */, $end /* Y-m-d H:i:s */, $aprox = 1) {
        $diff_seconds = self::get_past_time_seconds($start, $end);

        return self::get_diff_obj($diff_seconds, false);
    }

    public static function get_diff_obj_ext($seconds, $extenso = false) {
        $tempo = "";
        $hours = 0;
        $weeks = 0;
        $years = 0;
        if (( $seconds > 0 ) && ( $seconds < 3600 )) {
            $hours = floor($seconds / 3600);
            $seconds -= $hours * 3600;
            $minutes = floor($seconds / 60);
            $seconds -= $minutes * 60;
            /* Formato de dois dígitos para horas, minutos ou segundos menor que 10 */
            if ($hours < 10) {
                $hours = "0" . $hours;
            }
            if ($minutes < 10) {
                $minutes = "0" . $minutes;
            }
            if ($seconds < 10) {
                $seconds = "0" . $seconds;
            }
            if ($extenso == true) {
                $tempo = "Em " . $hours . " hora(s) " . $minutes . " minuto(s) " . $seconds . " segundo(s) ";
            } else {
                $tempo = "Em " . $hours . ":" . $minutes . ":" . $seconds . "";
            }
        } else if (( $seconds >= 3600 ) && ( $seconds < 86400 )) {
            $hours = floor($seconds / 3600);
            $seconds -= $hours * 3600;
            $minutes = floor($seconds / 60);
            $seconds -= $minutes * 60;
            /* Formato de dois dígitos para horas,  minutos ou segundos menor que 10 */
            if ($hours < 10) {
                $hours = "0" . $hours;
            }
            if ($minutes < 10) {
                $minutes = "0" . $minutes;
            }
            if ($seconds < 10) {
                $seconds = "0" . $seconds;
            }
            if ($extenso == true) {
                $tempo = "Em " . $hours . " hora(s) " . $minutes . " minuto(s) " . $seconds . " segundo(s) ";
            } else {
                $tempo = "Em " . $hours . ":" . $minutes . ":" . $seconds . "";
            }
        } else if (( $seconds >= 86400 ) && ( $seconds < 604800 )) {
            $hours = floor($seconds / 3600);
            $seconds -= $hours * 3600;
            $minutes = floor($seconds / 60);
            $seconds -= $minutes * 60;
            /* Formato de dois dígitos para horas, minutos ou segundos menor que 10 */
            if ($minutes < 10) {
                $minutes = "0" . $minutes;
            }
            if ($seconds < 10) {
                $seconds = "0" . $seconds;
            }
            if ($hours >= 24) {
                $days = floor($hours / 24);
                $hours = $hours % 24;
            }
            if ($hours < 10) {
                $hours = "0" . $hours;
            }
            if ($extenso == true) {
                $tempo = "Em " . $days . " dia(s) " . $hours . " hora(s) " . $minutes . " minuto(s) " . $seconds . " segundo(s) ";
            } else {
                $tempo = "Em " . $days . "d " . $hours . ":" . $minutes . ":" . $seconds . "";
            }
        } else if (( $seconds >= 604800 ) && ( $seconds < 31449600 )) {
            $hours = floor($seconds / 3600);
            if ($hours >= 24) {
                $days = floor($hours / 24);
                $hours = $hours % 24;
                if ($days >= 7) {
                    $weeks = floor($days / 7);
                    $days = $days % 7;
                }
            }
            if ($extenso == true) {
                if ($days == 0) {
                    $tempo = "Em " . $weeks . " semana(s) ";
                } else {
                    $tempo = "Em " . $weeks . " semana(s) " . $days . " dias";
                }
            } else {
                if ($days == 0) {
                    $tempo = "Em " . $weeks . "s";
                } else {
                    $tempo = "Em " . $weeks . "s " . $days . "d";
                }
            }
        } else if ($seconds >= 31449600) {
            $hours = floor($seconds / 3600);
            if ($hours >= 24) {
                $days = floor($hours / 24);
                $hours = $hours % 24;
                if ($days >= 7) {
                    $weeks = floor($days / 7);
                    $days = $days % 7;
                }
            }
            if ($weeks >= 52) {
                $years = floor($weeks / 52);
                $weeks = $weeks % 52;
            }
            if ($extenso == true) {
                if ($weeks == 0) {
                    $tempo = "Em " . $years . " ano(s)";
                } else {
                    $tempo = "Em " . $years . " ano(s) " . $weeks . " semana(s)";
                }
            } else {
                if ($weeks == 0) {
                    $tempo = "Em " . $years . "a ";
                } else {
                    $tempo = "Em " . $years . "a " . $weeks . "s";
                }
            }
        } else if ($seconds < 0) {
            $seconds *= -1;
            if (( $seconds > 0 ) && ( $seconds < 3600 )) {
                $hours = floor($seconds / 3600);
                $seconds -= $hours * 3600;
                $minutes = floor($seconds / 60);
                $seconds -= $minutes * 60;
                /* Formato de dois dígitos para horas, minutos ou segundos menor que 10 */
                if ($hours < 10) {
                    $hours = "0" . $hours;
                }
                if ($minutes < 10) {
                    $minutes = "0" . $minutes;
                }
                if ($seconds < 10) {
                    $seconds = "0" . $seconds;
                }
                if ($extenso == true) {
                    $tempo = "Há " . $hours . " hora(s) " . $minutes . " minuto(s) " . $seconds . " segundo(s) ";
                } else {
                    $tempo = "Há " . $hours . ":" . $minutes . ":" . $seconds . "";
                }
            } else if (( $seconds >= 3600 ) && ( $seconds < 86400 )) {
                $hours = floor($seconds / 3600);
                $seconds -= $hours * 3600;
                $minutes = floor($seconds / 60);
                $seconds -= $minutes * 60;
                /* Formato de dois dígitos para horas, minutos ou segundos menor que 10 */
                if ($hours < 10) {
                    $hours = "0" . $hours;
                }
                if ($minutes < 10) {
                    $minutes = "0" . $minutes;
                }
                if ($seconds < 10) {
                    $seconds = "0" . $seconds;
                }
                if ($extenso == true) {
                    $tempo = "Há " . $hours . " hora(s) " . $minutes . " minuto(s) " . $seconds . " segundo(s) ";
                } else {
                    $tempo = "Há " . $hours . ":" . $minutes . ":" . $seconds . "";
                }
            } else if (( $seconds >= 86400 ) && ( $seconds < 604800 )) {
                $hours = floor($seconds / 3600);
                $seconds -= $hours * 3600;
                $minutes = floor($seconds / 60);
                $seconds -= $minutes * 60;
                /* Formato de dois dígitos para horas, minutos ou segundos menor que 10 */
                if ($minutes < 10) {
                    $minutes = "0" . $minutes;
                }
                if ($seconds < 10) {
                    $seconds = "0" . $seconds;
                }
                if ($hours >= 24) {
                    $days = floor($hours / 24);
                    $hours = $hours % 24;
                }
                if ($hours < 10) {
                    $hours = "0" . $hours;
                }
                if ($extenso == true) {
                    $tempo = "Há " . $days . " dia(s) " . $hours . " hora(s) " . $minutes . " minuto(s) " . $seconds . " segundo(s) ";
                } else {
                    $tempo = "Há " . $days . "d " . $hours . ":" . $minutes . ":" . $seconds . "";
                }
            } else if (( $seconds >= 604800 ) && ( $seconds < 31449600 )) {
                $hours = floor($seconds / 3600);
                if ($hours >= 24) {
                    $days = floor($hours / 24);
                    $hours = $hours % 24;
                    if ($days >= 7) {
                        $weeks = floor($days / 7);
                        $days = $days % 7;
                    }
                }
                if ($extenso == true) {
                    if ($days == 0) {
                        $tempo = "Há " . $weeks . " semana(s) ";
                    } else {
                        $tempo = "Há " . $weeks . " semana(s) " . $days . " dias";
                    }
                } else {
                    if ($days == 0) {
                        $tempo = "Há " . $weeks . "s";
                    } else {
                        $tempo = "Há " . $weeks . "s " . $days . "d";
                    }
                }
            } else if ($seconds >= 31449600) {
                $hours = floor($seconds / 3600);
                if ($hours >= 24) {
                    $days = floor($hours / 24);
                    $hours = $hours % 24;
                    if ($days >= 7) {
                        $weeks = floor($days / 7);
                        $days = $days % 7;
                    }
                }
                if ($weeks >= 52) {
                    $years = floor($weeks / 52);
                    $weeks = $weeks % 52;
                }
                if ($extenso == true) {
                    if ($weeks == 0) {
                        $tempo = "Há " . $years . " ano(s)";
                    } else {
                        $tempo = "Há " . $years . " ano(s) " . $weeks . " semana(s)";
                    }
                } else {
                    if ($weeks == 0) {
                        $tempo = "Há " . $years . "a ";
                    } else {
                        $tempo = "Há " . $years . "a " . $weeks . "s";
                    }
                }
            }
        }

        return $tempo;
    }

    public static function day_time_workflow($seconds) {
        if (LOGINDES::permissao_ativa(192 /* DAY TIME WORKFLOW */)) {
            if (( $seconds <= 82800 ) && ( $seconds >= 3599 )) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public static function exp_first_hour_block(/* CLOSE */) {
        $seconds = DATES::get_past_time_seconds(date("Y-m-d H:i:s"), date("Y-m-d 00:00:00"));
        $day = date("d");
        if ($day == 21) {
            if (( $seconds <= 3600)/* 00:00 ~ 01:00 */) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @deprecated that's how the old version used to work!
     */
    public static function deprecated_day_time_workflow($seconds) {
        if (LOGINDES::permissao_ativa(192 /* DAY TIME WORKFLOW */)) {
            if (isset($_SESSION["filial"])) {
                if ($_SESSION["filial"] == 478 /* LUANDA */) {
                    if (( $seconds >= 7200 ) && ( $seconds <= 72000 )) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    if ($seconds >= 21600) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                if ($seconds >= 21600) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return true;
        }
    }

    /**
     * DIFERENÇA DO PRIMEIRO SEGUNDO DO DIA
     *
     * TURNO_M      28800   -   41399
     * ALMOCO       41400   -   48599
     * TURNO_T      48600   -   64799
     *
     * MADRUGADA        0   -   21599
     * MANHA        21600   -   43199
     * TARDE        43200   -   64799
     * NOITE        64800   -   86399
     */
    public static function get_ext_time_of_day($seconds_from_midnight) {
        $sfm = $seconds_from_midnight; //SHORT
        $day_time = "";
        /* DESCRIÇÃO */
        if (( $sfm >= 0 ) && ( $sfm <= 21599 )) {
            $day_time = "MADRUGADA";
        } else if (( $sfm >= 21600 ) && ( $sfm <= 43199 )) {
            $day_time = "MANHA";
        } else if (( $sfm >= 43200 ) && ( $sfm <= 64799 )) {
            $day_time = "TARDE";
        } else if (( $sfm >= 64800 ) && ( $sfm <= 86399 )) {
            $day_time = "NOITE";
        }
        /* TURNOS */
        if (( $sfm >= 28800 ) && ( $sfm <= 41399 )) {
            $day_time = "TURNO_M";
        } else if (( $sfm >= 41400 ) && ( $sfm <= 48599 )) {
            $day_time = "ALMOCO";
        } else if (( $sfm >= 48600 ) && ( $sfm <= 64799 )) {
            $day_time = "TURNO_T";
        }

        return $day_time;
    }

    public static function mysql_to_minutes($minutes_mysql) {
        $number = explode(".", $minutes_mysql);
        $min = $number[0];
        $sec = round(60 * "0.{$number[1]}");
        if ($sec <= 9) {
            $sec = "0{$sec}";
        }
        if ($min <= 9) {
            $min = "0{$min}";
        }
        $result = "{$min}:{$sec}";

        return $result;
    }

    public static function minutes_to_mysql($minutes) {
        //TODO
    }

    public static function month_description($month) {
        return ucfirst(strftime('%b', mktime(0, 0, 0, $month)));
    }

    public static function get_timestamp_date($date /* 0000-00-00 OR 0000-00-00 00:00:00 */) {
        $time = strtotime($date);

        return $time;
    }

    public static function get_timestamp_date_first_day($date /* 0000-00-00 OR 0000-00-00 00:00:00 */) {
        $getYear = strtok($date, "-");
        $getMonth = strtok("-");
        $date = "$getYear-$getMonth-01 00:00:00";
        $time = strtotime($date);

        return $time;
    }

    public static function get_last_month() {
        $data_anterior[] = date("m");
        $data_anterior[] = date("Y");

        $data_anterior[0] = ( $data_anterior[0] - 1 );

        if ($data_anterior[0] == 0) {
            $data_anterior[0] = 12;
            $data_anterior[1] = ( $data_anterior[1] - 1 );
        }

        return $data_anterior;
    }

    public static function get_last_month_date() {
        $date = new DateTime(date("Y-m") . "-15");
        $date->modify("-1 month");

        return $date->format("Y-m");
    }

    public static function verify_if_date_is_contained($date_start, $date_end, $date_to_test) {
        $str_start = strtotime($date_start);
        $str_end = strtotime($date_end);
        $str_date_to_test = strtotime($date_to_test);

        if (( $str_date_to_test >= $str_start ) && ( $str_date_to_test <= $str_end )) {
            return true;
        } else {
            return false;
        }
    }

}
