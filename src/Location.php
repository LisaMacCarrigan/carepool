<?php

    class Location
    {
        private $longitude;
        private $latitude;

        function __construct($longitude, $latitude)
        {
            $this->longitude = self::formatGeo($longitude, 6);
            $this->latitude = self::formatGeo($latitude, 6);
        }




        static function formatGeo($input, $precision, $total_digits=null)
        {
            if (is_numeric($precision))
            {
                $format_string = "%'.0" . $precision . "f";
            }
            else
            {
                print("\nERROR: PRECISION IS NON NUMERIC\n");
                return null;
            }

            $input_type = gettype($input);
            if ($input_type === "string")
            {
                if (is_numeric($input))
                {
                    $formatted_input_string = sprintf($format_string, $input);


                    if (is_numeric($total_digits))
                    {
                        $max_base_ten_exponent = $total_digits - $precision;
                        $max = pow(10, $max_base_ten_exponent);
                        $min = $max * (-1);

                        $string_float_value = (float) $formatted_input_string;

                        //CHECK THAT THE FORMAT IS IN RANGE
                        if ( $string_float_value >= $max || $string_float_value <= $min)
                        {
                            print("\nERROR: INPUT IS OUT OF RANGE\n");
                            return null;
                        }
                    }

                }
                else
                {
                    print("\nERROR: INPUT IS NON NUMERIC\n");
                    return null;
                }
            }
            else if ($input_type === "integer" || $input_type === "double")
            {
                if (is_numeric($input))
                {
                    $formatted_input_string = sprintf($format_string, $input);

                    if (is_numeric($total_digits))
                    {
                        $max_base_ten_exponent = $total_digits - $precision;
                        $max = pow(10, $max_base_ten_exponent);
                        $min = $max * (-1);

                        $string_float_value = (float) $formatted_input_string;

                        //CHECK THAT THE FORMAT IS IN RANGE
                        if ( $string_float_value >= $max || $string_float_value <= $min)
                        {
                            print("\nERROR: INPUT IS OUT OF RANGE\n");
                            return null;
                        }
                    }
                }
                else
                {
                    $formatted_input_string = sprintf($format_string, $input);
                }
            }
            else
            {
                return null;
            }

            return $formatted_input_string;
        }




        /*===GETTERS/SETTERS===================================*/
        function getLongitude()
        {
            return $this->longitude;
        }

        function setLongitude($new_longitude)
        {
            $this->longitude = self::formatGeo($new_longitude, 6);
        }

        function getLatitude()
        {
            return $this->latitude;
        }

        function setLatitude($new_latitude)
        {
            $this->latitude = self::formatGeo($new_latitude, 6);
        }



        function getLocation()
        {
            $location = [$this->getLongitude, $this->getLatitude];
            return $location;
        }


    }

 ?>
