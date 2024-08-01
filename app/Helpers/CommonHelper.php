<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Log;
use App\Models\PlatformAccount;
use Illuminate\Support\Str;
use App\Models\CustomRole;
use App\Models\AuditLog;
use App\Models\Products;
use App\Models\UserRole;
use App\Models\UserHsm;
use GuzzleHttp\Client;
use ZxcvbnPhp\Zxcvbn;
use App\Models\User;
use Exception;

class CommonHelper
{

    /*
    |--------------------------------------------------------------------------
    |  Common Helper
    |--------------------------------------------------------------------------
    |
    | This helper is used for common methods written in controllers.
    | This helper contain common methods that used at various controllers.
    |
    */

    public static function ipInfo($ip = NULL, $purpose = "location", $deep_detect = TRUE): array
    {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }

        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }

        return $output;
    }

    public static function getCountryCodeFromIP($ip = NULL, $purpose = "location", $deep_detect = TRUE): array
    {
        $countryArray = array(
            'AD' => array('name' => 'ANDORRA', 'code' => '+376'),
            'AE' => array('name' => 'UNITED ARAB EMIRATES', 'code' => '+971'),
            'AF' => array('name' => 'AFGHANISTAN', 'code' => '+93'),
            'AG' => array('name' => 'ANTIGUA AND BARBUDA', 'code' => '+1268'),
            'AI' => array('name' => 'ANGUILLA', 'code' => '+1264'),
            'AL' => array('name' => 'ALBANIA', 'code' => '+355'),
            'AM' => array('name' => 'ARMENIA', 'code' => '+374'),
            'AN' => array('name' => 'NETHERLANDS ANTILLES', 'code' => '+599'),
            'AO' => array('name' => 'ANGOLA', 'code' => '+244'),
            'AQ' => array('name' => 'ANTARCTICA', 'code' => '+672'),
            'AR' => array('name' => 'ARGENTINA', 'code' => '+54'),
            'AS' => array('name' => 'AMERICAN SAMOA', 'code' => '+1684'),
            'AT' => array('name' => 'AUSTRIA', 'code' => '+43'),
            'AU' => array('name' => 'AUSTRALIA', 'code' => '+61'),
            'AW' => array('name' => 'ARUBA', 'code' => '+297'),
            'AZ' => array('name' => 'AZERBAIJAN', 'code' => '+994'),
            'BA' => array('name' => 'BOSNIA AND HERZEGOVINA', 'code' => '+387'),
            'BB' => array('name' => 'BARBADOS', 'code' => '+1246'),
            'BD' => array('name' => 'BANGLADESH', 'code' => '+880'),
            'BE' => array('name' => 'BELGIUM', 'code' => '+32'),
            'BF' => array('name' => 'BURKINA FASO', 'code' => '+226'),
            'BG' => array('name' => 'BULGARIA', 'code' => '+359'),
            'BH' => array('name' => 'BAHRAIN', 'code' => '+973'),
            'BI' => array('name' => 'BURUNDI', 'code' => '+257'),
            'BJ' => array('name' => 'BENIN', 'code' => '+229'),
            'BL' => array('name' => 'SAINT BARTHELEMY', 'code' => '+590'),
            'BM' => array('name' => 'BERMUDA', 'code' => '+1441'),
            'BN' => array('name' => 'BRUNEI DARUSSALAM', 'code' => '+673'),
            'BO' => array('name' => 'BOLIVIA', 'code' => '+591'),
            'BR' => array('name' => 'BRAZIL', 'code' => '+55'),
            'BS' => array('name' => 'BAHAMAS', 'code' => '+1242'),
            'BT' => array('name' => 'BHUTAN', 'code' => '+975'),
            'BW' => array('name' => 'BOTSWANA', 'code' => '+267'),
            'BY' => array('name' => 'BELARUS', 'code' => '+375'),
            'BZ' => array('name' => 'BELIZE', 'code' => '+501'),
            'CA' => array('name' => 'CANADA', 'code' => '+1'),
            'CC' => array('name' => 'COCOS (KEELING) ISLANDS', 'code' => '+61'),
            'CD' => array('name' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'code' => '+243'),
            'CF' => array('name' => 'CENTRAL AFRICAN REPUBLIC', 'code' => '+236'),
            'CG' => array('name' => 'CONGO', 'code' => '+242'),
            'CH' => array('name' => 'SWITZERLAND', 'code' => '+41'),
            'CI' => array('name' => 'COTE D IVOIRE', 'code' => '+225'),
            'CK' => array('name' => 'COOK ISLANDS', 'code' => '+682'),
            'CL' => array('name' => 'CHILE', 'code' => '+56'),
            'CM' => array('name' => 'CAMEROON', 'code' => '+237'),
            'CN' => array('name' => 'CHINA', 'code' => '+86'),
            'CO' => array('name' => 'COLOMBIA', 'code' => '+57'),
            'CR' => array('name' => 'COSTA RICA', 'code' => '+506'),
            'CU' => array('name' => 'CUBA', 'code' => '+53'),
            'CV' => array('name' => 'CAPE VERDE', 'code' => '+238'),
            'CX' => array('name' => 'CHRISTMAS ISLAND', 'code' => '+61'),
            'CY' => array('name' => 'CYPRUS', 'code' => '+357'),
            'CZ' => array('name' => 'CZECH REPUBLIC', 'code' => '+420'),
            'DE' => array('name' => 'GERMANY', 'code' => '+49'),
            'DJ' => array('name' => 'DJIBOUTI', 'code' => '+253'),
            'DK' => array('name' => 'DENMARK', 'code' => '+45'),
            'DM' => array('name' => 'DOMINICA', 'code' => '+1767'),
            'DO' => array('name' => 'DOMINICAN REPUBLIC', 'code' => '+1809'),
            'DZ' => array('name' => 'ALGERIA', 'code' => '+213'),
            'EC' => array('name' => 'ECUADOR', 'code' => '+593'),
            'EE' => array('name' => 'ESTONIA', 'code' => '+372'),
            'EG' => array('name' => 'EGYPT', 'code' => '+20'),
            'ER' => array('name' => 'ERITREA', 'code' => '+291'),
            'ES' => array('name' => 'SPAIN', 'code' => '+34'),
            'ET' => array('name' => 'ETHIOPIA', 'code' => '+251'),
            'FI' => array('name' => 'FINLAND', 'code' => '+358'),
            'FJ' => array('name' => 'FIJI', 'code' => '+679'),
            'FK' => array('name' => 'FALKLAND ISLANDS (MALVINAS)', 'code' => '+500'),
            'FM' => array('name' => 'MICRONESIA, FEDERATED STATES OF', 'code' => '+691'),
            'FO' => array('name' => 'FAROE ISLANDS', 'code' => '+298'),
            'FR' => array('name' => 'FRANCE', 'code' => '+33'),
            'GA' => array('name' => 'GABON', 'code' => '+241'),
            'GB' => array('name' => 'UNITED KINGDOM', 'code' => '+44'),
            'GD' => array('name' => 'GRENADA', 'code' => '+1473'),
            'GE' => array('name' => 'GEORGIA', 'code' => '+995'),
            'GH' => array('name' => 'GHANA', 'code' => '+233'),
            'GI' => array('name' => 'GIBRALTAR', 'code' => '+350'),
            'GL' => array('name' => 'GREENLAND', 'code' => '+299'),
            'GM' => array('name' => 'GAMBIA', 'code' => '+220'),
            'GN' => array('name' => 'GUINEA', 'code' => '+224'),
            'GQ' => array('name' => 'EQUATORIAL GUINEA', 'code' => '+240'),
            'GR' => array('name' => 'GREECE', 'code' => '+30'),
            'GT' => array('name' => 'GUATEMALA', 'code' => '+502'),
            'GU' => array('name' => 'GUAM', 'code' => '+1671'),
            'GW' => array('name' => 'GUINEA-BISSAU', 'code' => '+245'),
            'GY' => array('name' => 'GUYANA', 'code' => '+592'),
            'HK' => array('name' => 'HONG KONG', 'code' => '+852'),
            'HN' => array('name' => 'HONDURAS', 'code' => '+504'),
            'HR' => array('name' => 'CROATIA', 'code' => '+385'),
            'HT' => array('name' => 'HAITI', 'code' => '+509'),
            'HU' => array('name' => 'HUNGARY', 'code' => '+36'),
            'ID' => array('name' => 'INDONESIA', 'code' => '+62'),
            'IE' => array('name' => 'IRELAND', 'code' => '+353'),
            'IL' => array('name' => 'ISRAEL', 'code' => '+972'),
            'IM' => array('name' => 'ISLE OF MAN', 'code' => '+44'),
            'IN' => array('name' => 'INDIA', 'code' => '+91'),
            'IQ' => array('name' => 'IRAQ', 'code' => '+964'),
            'IR' => array('name' => 'IRAN, ISLAMIC REPUBLIC OF', 'code' => '+98'),
            'IS' => array('name' => 'ICELAND', 'code' => '+354'),
            'IT' => array('name' => 'ITALY', 'code' => '+39'),
            'JM' => array('name' => 'JAMAICA', 'code' => '+1876'),
            'JO' => array('name' => 'JORDAN', 'code' => '+962'),
            'JP' => array('name' => 'JAPAN', 'code' => '+81'),
            'KE' => array('name' => 'KENYA', 'code' => '+254'),
            'KG' => array('name' => 'KYRGYZSTAN', 'code' => '+996'),
            'KH' => array('name' => 'CAMBODIA', 'code' => '+855'),
            'KI' => array('name' => 'KIRIBATI', 'code' => '+686'),
            'KM' => array('name' => 'COMOROS', 'code' => '+269'),
            'KN' => array('name' => 'SAINT KITTS AND NEVIS', 'code' => '+1869'),
            'KP' => array('name' => 'KOREA DEMOCRATIC PEOPLES REPUBLIC OF', 'code' => '+850'),
            'KR' => array('name' => 'KOREA REPUBLIC OF', 'code' => '+82'),
            'KW' => array('name' => 'KUWAIT', 'code' => '+965'),
            'KY' => array('name' => 'CAYMAN ISLANDS', 'code' => '+1345'),
            'KZ' => array('name' => 'KAZAKSTAN', 'code' => '+7'),
            'LA' => array('name' => 'LAO PEOPLES DEMOCRATIC REPUBLIC', 'code' => '+856'),
            'LB' => array('name' => 'LEBANON', 'code' => '+961'),
            'LC' => array('name' => 'SAINT LUCIA', 'code' => '+1758'),
            'LI' => array('name' => 'LIECHTENSTEIN', 'code' => '+423'),
            'LK' => array('name' => 'SRI LANKA', 'code' => '+94'),
            'LR' => array('name' => 'LIBERIA', 'code' => '+231'),
            'LS' => array('name' => 'LESOTHO', 'code' => '+266'),
            'LT' => array('name' => 'LITHUANIA', 'code' => '+370'),
            'LU' => array('name' => 'LUXEMBOURG', 'code' => '+352'),
            'LV' => array('name' => 'LATVIA', 'code' => '+371'),
            'LY' => array('name' => 'LIBYAN ARAB JAMAHIRIYA', 'code' => '+218'),
            'MA' => array('name' => 'MOROCCO', 'code' => '+212'),
            'MC' => array('name' => 'MONACO', 'code' => '+377'),
            'MD' => array('name' => 'MOLDOVA, REPUBLIC OF', 'code' => '+373'),
            'ME' => array('name' => 'MONTENEGRO', 'code' => '+382'),
            'MF' => array('name' => 'SAINT MARTIN', 'code' => '+1599'),
            'MG' => array('name' => 'MADAGASCAR', 'code' => '+261'),
            'MH' => array('name' => 'MARSHALL ISLANDS', 'code' => '+692'),
            'MK' => array('name' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'code' => '+389'),
            'ML' => array('name' => 'MALI', 'code' => '+223'),
            'MM' => array('name' => 'MYANMAR', 'code' => '+95'),
            'MN' => array('name' => 'MONGOLIA', 'code' => '+976'),
            'MO' => array('name' => 'MACAU', 'code' => '+853'),
            'MP' => array('name' => 'NORTHERN MARIANA ISLANDS', 'code' => '+1670'),
            'MR' => array('name' => 'MAURITANIA', 'code' => '+222'),
            'MS' => array('name' => 'MONTSERRAT', 'code' => '+1664'),
            'MT' => array('name' => 'MALTA', 'code' => '+356'),
            'MU' => array('name' => 'MAURITIUS', 'code' => '+230'),
            'MV' => array('name' => 'MALDIVES', 'code' => '+960'),
            'MW' => array('name' => 'MALAWI', 'code' => '+265'),
            'MX' => array('name' => 'MEXICO', 'code' => '+52'),
            'MY' => array('name' => 'MALAYSIA', 'code' => '+60'),
            'MZ' => array('name' => 'MOZAMBIQUE', 'code' => '+258'),
            'NA' => array('name' => 'NAMIBIA', 'code' => '+264'),
            'NC' => array('name' => 'NEW CALEDONIA', 'code' => '+687'),
            'NE' => array('name' => 'NIGER', 'code' => '+227'),
            'NG' => array('name' => 'NIGERIA', 'code' => '+234'),
            'NI' => array('name' => 'NICARAGUA', 'code' => '+505'),
            'NL' => array('name' => 'NETHERLANDS', 'code' => '+31'),
            'NO' => array('name' => 'NORWAY', 'code' => '+47'),
            'NP' => array('name' => 'NEPAL', 'code' => '+977'),
            'NR' => array('name' => 'NAURU', 'code' => '+674'),
            'NU' => array('name' => 'NIUE', 'code' => '+683'),
            'NZ' => array('name' => 'NEW ZEALAND', 'code' => '+64'),
            'OM' => array('name' => 'OMAN', 'code' => '+968'),
            'PA' => array('name' => 'PANAMA', 'code' => '+507'),
            'PE' => array('name' => 'PERU', 'code' => '+51'),
            'PF' => array('name' => 'FRENCH POLYNESIA', 'code' => '+689'),
            'PG' => array('name' => 'PAPUA NEW GUINEA', 'code' => '+675'),
            'PH' => array('name' => 'PHILIPPINES', 'code' => '+63'),
            'PK' => array('name' => 'PAKISTAN', 'code' => '+92'),
            'PL' => array('name' => 'POLAND', 'code' => '+48'),
            'PM' => array('name' => 'SAINT PIERRE AND MIQUELON', 'code' => '+508'),
            'PN' => array('name' => 'PITCAIRN', 'code' => '+870'),
            'PR' => array('name' => 'PUERTO RICO', 'code' => '+1'),
            'PT' => array('name' => 'PORTUGAL', 'code' => '+351'),
            'PW' => array('name' => 'PALAU', 'code' => '+680'),
            'PY' => array('name' => 'PARAGUAY', 'code' => '+595'),
            'QA' => array('name' => 'QATAR', 'code' => '+974'),
            'RO' => array('name' => 'ROMANIA', 'code' => '+40'),
            'RS' => array('name' => 'SERBIA', 'code' => '+381'),
            'RU' => array('name' => 'RUSSIAN FEDERATION', 'code' => '+7'),
            'RW' => array('name' => 'RWANDA', 'code' => '+250'),
            'SA' => array('name' => 'SAUDI ARABIA', 'code' => '+966'),
            'SB' => array('name' => 'SOLOMON ISLANDS', 'code' => '+677'),
            'SC' => array('name' => 'SEYCHELLES', 'code' => '+248'),
            'SD' => array('name' => 'SUDAN', 'code' => '+249'),
            'SE' => array('name' => 'SWEDEN', 'code' => '+46'),
            'SG' => array('name' => 'SINGAPORE', 'code' => '+65'),
            'SH' => array('name' => 'SAINT HELENA', 'code' => '+290'),
            'SI' => array('name' => 'SLOVENIA', 'code' => '+386'),
            'SK' => array('name' => 'SLOVAKIA', 'code' => '+421'),
            'SL' => array('name' => 'SIERRA LEONE', 'code' => '+232'),
            'SM' => array('name' => 'SAN MARINO', 'code' => '+378'),
            'SN' => array('name' => 'SENEGAL', 'code' => '+221'),
            'SO' => array('name' => 'SOMALIA', 'code' => '+252'),
            'SR' => array('name' => 'SURINAME', 'code' => '+597'),
            'ST' => array('name' => 'SAO TOME AND PRINCIPE', 'code' => '+239'),
            'SV' => array('name' => 'EL SALVADOR', 'code' => '+503'),
            'SY' => array('name' => 'SYRIAN ARAB REPUBLIC', 'code' => '+963'),
            'SZ' => array('name' => 'SWAZILAND', 'code' => '+268'),
            'TC' => array('name' => 'TURKS AND CAICOS ISLANDS', 'code' => '+1649'),
            'TD' => array('name' => 'CHAD', 'code' => '+235'),
            'TG' => array('name' => 'TOGO', 'code' => '+228'),
            'TH' => array('name' => 'THAILAND', 'code' => '+66'),
            'TJ' => array('name' => 'TAJIKISTAN', 'code' => '+992'),
            'TK' => array('name' => 'TOKELAU', 'code' => '+690'),
            'TL' => array('name' => 'TIMOR-LESTE', 'code' => '+670'),
            'TM' => array('name' => 'TURKMENISTAN', 'code' => '+993'),
            'TN' => array('name' => 'TUNISIA', 'code' => '+216'),
            'TO' => array('name' => 'TONGA', 'code' => '+676'),
            'TR' => array('name' => 'TURKEY', 'code' => '+90'),
            'TT' => array('name' => 'TRINIDAD AND TOBAGO', 'code' => '+1868'),
            'TV' => array('name' => 'TUVALU', 'code' => '+688'),
            'TW' => array('name' => 'TAIWAN, PROVINCE OF CHINA', 'code' => '+886'),
            'TZ' => array('name' => 'TANZANIA, UNITED REPUBLIC OF', 'code' => '+255'),
            'UA' => array('name' => 'UKRAINE', 'code' => '+380'),
            'UG' => array('name' => 'UGANDA', 'code' => '+256'),
            'US' => array('name' => 'UNITED STATES', 'code' => '+1'),
            'UY' => array('name' => 'URUGUAY', 'code' => '+598'),
            'UZ' => array('name' => 'UZBEKISTAN', 'code' => '+998'),
            'VA' => array('name' => 'HOLY SEE (VATICAN CITY STATE)', 'code' => '+39'),
            'VC' => array('name' => 'SAINT VINCENT AND THE GRENADINES', 'code' => '+1784'),
            'VE' => array('name' => 'VENEZUELA', 'code' => '+58'),
            'VG' => array('name' => 'VIRGIN ISLANDS, BRITISH', 'code' => '+1284'),
            'VI' => array('name' => 'VIRGIN ISLANDS, U.S.', 'code' => '+1340'),
            'VN' => array('name' => 'VIET NAM', 'code' => '+84'),
            'VU' => array('name' => 'VANUATU', 'code' => '+678'),
            'WF' => array('name' => 'WALLIS AND FUTUNA', 'code' => '+681'),
            'WS' => array('name' => 'SAMOA', 'code' => '+685'),
            'XK' => array('name' => 'KOSOVO', 'code' => '+381'),
            'YE' => array('name' => 'YEMEN', 'code' => '+967'),
            'YT' => array('name' => 'MAYOTTE', 'code' => '+262'),
            'ZA' => array('name' => 'SOUTH AFRICA', 'code' => '+27'),
            'ZM' => array('name' => 'ZAMBIA', 'code' => '+260'),
            'ZW' => array('name' => 'ZIMBABWE', 'code' => '+263')
        );
        $countryCode = "IN";

        if (self::ipInfo($ip, "Country Code")) {
            $countryCode = self::ipInfo($ip, "Country Code");
        }

        $matchCountryArray  = $countryArray[$countryCode];

        return ["phoneCode" =>  $matchCountryArray['code'], "counryName" =>  $matchCountryArray['name']];
    }

    public static function getUser($where): Collection
    {
        return User::where($where)->selectRaw('users.*')->first();
    }

    public static function credentials($request): array
    {
        if (is_numeric($request->email)) {
            return [
                'where' => ['phoneNo' => $request->email],
                'type' => 'phone no'
            ];
        } elseif (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return [
                'where' => ['email' => $request->email],
                'type' => 'email'
            ];
        }
        return [
            'where' => ['userName' => $request->email],
            'type' => 'user name'
        ];
    }

    public static function encrypt($string): string|bool
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'flashX';
        $secret_iv = 'flashX';

        // hash
        $key = substr(hash('sha256', $secret_key), 0, 32);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        //    dd($key,$iv);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        //dd($output);
        // $output = base64_encode($output);

        return $output;
    }

    public static function decrypt($string): bool|string
    {

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'flashX';
        $secret_iv = 'flashX';

        // hash
        $key = substr(hash('sha256', $secret_key), 0, 32);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

        return $output;
    }

    public static function getOperatingSystem(): string
    {
        $u_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $operating_system = 'Unknown Operating System';

        //Get the operating_system name
        if ($u_agent) {
            if (preg_match('/linux/i', $u_agent)) {
                $operating_system = 'Linux';
            } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
                // $operating_system = 'Mac';
                $operating_system = 'MacBook';
            } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
                $operating_system = 'Windows';
            } elseif (preg_match('/ubuntu/i', $u_agent)) {
                $operating_system = 'Ubuntu';
            } elseif (preg_match('/iphone/i', $u_agent)) {
                $operating_system = 'IPhone';
            } elseif (preg_match('/ipod/i', $u_agent)) {
                $operating_system = 'IPod';
            } elseif (preg_match('/ipad/i', $u_agent)) {
                $operating_system = 'IPad';
            } elseif (preg_match('/android/i', $u_agent)) {
                $operating_system = 'Android';
            } elseif (preg_match('/blackberry/i', $u_agent)) {
                $operating_system = 'Blackberry';
            } elseif (preg_match('/webos/i', $u_agent)) {
                $operating_system = 'Mobile';
            }
        } else {
            $operating_system = php_uname('s');
        }

        return $operating_system;
    }

    public static function myIp(): string
    {
        return Request::ip();
    }

    public static function auditLog($url = null, $description, $accessMode = null, $password = null, $browser = null): bool
    {
        $user = Auth::user();
        // if ($user->role == 'user') {
        $parentUserId = $user->role == 'business' ?  $user->id :  $user->parentId;
        $insertData = [
            'id' => Str::uuid(),
            'user_id' => $user->id,
            'ip_address' => Request::ip(),
            'url' => $url,
            // 'action' => $action,
            'access_mode' => $accessMode ?? null,
            'browser' => $browser ?? self::getClientBrowserName()
        ];
        return AuditLog::insert($insertData);
        // }
    }

    public static function checkPasswordStrength($password): string
    {
        $zxcvbn = new Zxcvbn();
        $result = $zxcvbn->passwordStrength($password);

        // You can now use $result to get information about password strength
        $score = $result['score']; // Score from 0 to 4 (0 being weakest, 4 being strongest)
        $feedback = $result['feedback']['suggestions'];

        // You can use the $score to categorize the password strength as high, medium, or low
        if ($score >= 3) {
            return 'High';
        } elseif ($score >= 2) {
            return 'Medium';
        } else {
            return 'Low';
        }
    }

    public static function unLinkImage($folderName = null, $imageName = null): void
    {
        if (!empty($folderName) && !empty($imageName)) {
            unlink("storage/" . $folderName . '/' . $imageName);
        }
    }

    public static function convertToReadableSize($size): string
    {
        $base = log($size) / log(1024);
        $suffix = array(" B", " KB", " MB", " GB", " TB");
        $f_base = floor($base);

        return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
    }

    public static function removeLastStringAfterSpace($string): string
    {
        return substr($string, 0, strrpos($string, ' '));
    }

    public static function removeFirstStringBeforeSpace($string): string
    {
        return trim(strstr($string, ' '));
    }

    public static function getUserCustomRole(): CustomRole
    {
        $user   = Auth::user();
        $roleId = UserRole::where('userId', $user->id)->pluck('roleId')->first();
        return CustomRole::where('id', $roleId)->first();
    }

    public static function getUserCustomMultipleRoles($permission, $index): bool
    {
        $user   = Auth::user();
        $roleId = UserRole::where('userId', $user->id)->pluck('roleId')->toArray();
        $roles = CustomRole::whereIn('id', $roleId)->get();

        foreach ($roles as $role) {
            if (isset($role->permission[$index]) && in_array($permission, $role->permission[$index])) {
                return true;
            }
        }
        return false;
    }

    public static function getPermissions(): array
    {
        return [
            "cloud" => [
                "index",
                "uploadCloudFile",
                "fileDetails",
                "deleteCloudFile"
            ],
            "custom-roles" => [
                "index",
                "create",
                "edit",
                "show",
                "roleDelete"
            ],
            "members" => [
                "index",
                "addMember",
                "edit",
                "show",
                "deleteUser",
                "changeMemberStatus"
            ],
            "hsm-device" => [
                "index",
                "hsmsToolDetails"
            ],
            "setting" => [
                "settingForm",
                "changePassword",
                "updateProfile"
            ]
        ];
    }

    public static function formatSizeUnits($bytes): string
    {
        // dd($bytes);
        if ($bytes >= 1125899906842624) {
            $bytes = number_format($bytes / 1125899906842624, 2) . ' PB';
        } elseif ($bytes >= 1099511627776) {
            $bytes = number_format($bytes / 1099511627776, 2) . ' TB';
        } elseif ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public static function formatSizeConvertToBytes($size, $type): string
    {
        if ($type == 'PB') {
            $bytes = $size * 1125899906842624;
        } else if ($type == 'TB') {
            $bytes = $size * 1099511627776;
        } elseif ($type == 'GB') {
            $bytes = $size * 1073741824;
        } elseif ($type == 'MB') {
            $bytes = $size * 1048576;
        } elseif ($type == 'KB') {
            $bytes = $size * 1024;
        } else {
            $bytes = 0;
        }
        return $bytes;
    }

    public static function passwordStorageInfo($user = null, $password = null, $showDetails = null): array|string
    {
        $passwordSize = strlen($password);
        $hsmDetail = UserHsm::selectRaw('user_hsm.id, hsms_tools.id as hsmId, user_hsm.organizerId, user_hsm.allocatedStorage,
                                        user_hsm.usedSpace, user_hsm.availableSpace, user_hsm.totalPasswords, user_hsm.totalPlatforms,
                                        hsms_tools.name, hsms_tools.macId, hsms_tools.location, hsms_tools.hsmStatus, hsms_tools.temperature,
                                        DATE_FORMAT(hsms_tools.updatedAt,"%d %M, %Y %h:%i:%s") as lastAccessDateTime, user_hsm.createdAt')
            ->where('user_hsm.hsmId', $user->primaryHsmId)
            ->where('user_hsm.organizerId', $user->id)
            ->leftJoin('hsms_tools', 'hsms_tools.id', 'user_hsm.hsmId')
            ->first();

        if ($password) {
            $remainStorage = ($hsmDetail->availableSpace - $passwordSize);
            $usedSpace   = (($hsmDetail->usedSpace ?? 0) + $passwordSize);
            $totalPassword = (($hsmDetail->totalPasswords ?? 0) + 1);
            $hsmDetail->update(['availableSpace' => $remainStorage, 'usedSpace' => $usedSpace, 'totalPasswords' => $totalPassword]);
        }


        if ($showDetails == 1) {
            $usersIds = User::getUserOrParentUserId();

            $platformAccount = PlatformAccount::selectRaw('platform_accounts.*,DATE_FORMAT(platform_accounts.createdAt,"%M %d, %Y %H:%i") as createdTime, users.userName')
                ->leftJoin('users', 'users.id', 'platform_accounts.userId')
                ->whereIn('platform_accounts.userId', [$user->id])
                ->where('platform_accounts.hsmId', $user->primaryHsmId);



            $auditLog = AuditLog::getAuditList();

            //Check User
            $totalUserCount = count($usersIds);
            if (in_array($user->id, $usersIds)) {
                $totalUserCount =  (count($usersIds) - 1);
            }

            $recentActivity = AuditLog::selectRaw('audit_logs.*, IF(audit_logs.action = "index","List",audit_logs.action) as action, DATE_FORMAT(audit_logs.createdAt,"%b %d, %Y | %h:%i:%s %p") as createdAtFormat, users.email as userEmail,
             users.userName, CONCAT(users.firstName," ",users.lastName) as fullName, users.role, organization_custom_roles.roleName')
                ->join('users', 'users.id', 'audit_logs.userId')
                ->leftJoin('user_roles', 'user_roles.userId', 'audit_logs.userId')
                ->leftJoin('organization_custom_roles', 'organization_custom_roles.id', 'user_roles.roleId')
                ->orderBy('audit_logs.createdAt', 'desc');

            $totalUserPasswordCount = [];
            if ($user->role == 'business') {
                $recentActivity->where('audit_logs.parentId', $user->id);

                $totalOrganizerPasswordCount = PlatformAccount::where(['platform_accounts.userId' => $user->id, 'platform_accounts.hsmId' => $user->primaryHsmId])->count();

                $organizerUserIds = User::where('parentId', $user->id)->pluck('id')->toArray();
                foreach ($organizerUserIds as $key => $usrId) {
                    $totalUserPasswordCount[] = PlatformAccount::where(['platform_accounts.userId' => $usrId, 'platform_accounts.hsmId' => $user->primaryHsmId])
                        ->count();
                }
            } else {
                $recentActivity->where('audit_logs.userId', $user->id);
            }

            if ($user->primaryHsmId) {
                $hsmDetail->update(['totalPlatforms' => PlatformAccount::where(['platform_accounts.hsmId' => $user->primaryHsmId, 'userId' => $user->id])->groupBy('platform')->get()->count()]);
            }


            return [
                'usedSpace' => $hsmDetail ? self::formatSizeUnits($hsmDetail->usedSpace) : 0,
                'usedSpaceBytes' => $hsmDetail ? $hsmDetail->usedSpace : 0,
                'avaliableSpace' => $hsmDetail ? self::formatSizeUnits($hsmDetail->availableSpace) : 0,
                'avaliableSpaceBytes' => $hsmDetail ? $hsmDetail->availableSpace : 0,
                'allocatedStorage' => $hsmDetail ? self::formatSizeUnits($hsmDetail->allocatedStorage) : 0,
                'allocatedStorageBytes' => $hsmDetail ? $hsmDetail->allocatedStorage : 0,
                'totalUploadedPassword' => $hsmDetail ? $hsmDetail->totalPasswords : 0,
                'numberOfPlatforms' => $hsmDetail ? $hsmDetail->totalPlatforms : 0,
                // 'numberOfPlatforms' => $platformAccount->groupBy('platform_accounts.platform')->get()->count(),
                'platformAccount' => $platformAccount->orderBy('createdAt', 'desc')->get(),
                'platformDetail' =>  $platformAccount->groupBy('platform_accounts.platform')->get(),
                'hsmDetail' => $hsmDetail,
                'totalUsers' => $totalUserCount,
                'lastUpdated' => $auditLog['lastUpdateAtTimeFormat'],
                'recentActivity' => $recentActivity->take(5)->get(),
                'totalUserPasswordCount' => array_sum($totalUserPasswordCount) ?? 0,
                'totalOrganizerPasswordCount' => $totalOrganizerPasswordCount ?? 0
            ];
        }

        return true;
    }

    public static function getAllHsmDevice($user): UserHsm
    {

        $hsmDetail = UserHsm::selectRaw('user_hsm.id, hsms_tools.id as hsmId, user_hsm.organizerId, users.companyName,
                                            user_hsm.allocatedStorage, usedSpace, availableSpace, totalPasswords, totalPlatforms,
                                            hsms_tools.name, hsms_tools.macId, hsms_tools.location, hsms_tools.hsmStatus, user_hsm.createdAt, DATE_FORMAT(hsms_tools.lastUseDateTime,"%d %M, %Y %h:%i:%s") as lastUseDateTime,
                                            DATE_FORMAT(hsms_tools.updatedAt,"%d %M, %Y %h:%i:%s") as lastAccessDateTime, hsms_tools.temperature')
            ->where('user_hsm.organizerId', $user->id)
            ->leftJoin('hsms_tools', 'hsms_tools.id', 'user_hsm.hsmId')
            ->leftJoin('users', 'users.id', 'user_hsm.organizerId')
            ->get();

        return $hsmDetail;
    }

    public static function sendOtpMobile($otp, $mobileNo): void
    {
        //Send OTP on mobile number
        $to = $mobileNo;
        $message = trans('messages.login.otp_msg', ['otp' => $otp]);

        $cmd = 'cd ' . base_path() . ' && php artisan twilio:sendsms "' . $to . '" "' . $message . '"';
        exec($cmd . ' > /dev/null &');
    }

    public static function getOGImage($url): string
    {
        try {
            $postUrl = "https://besticon-demo.herokuapp.com/allicons.json?url=" . ($url);

            $response = self::guzzleApiCall('POST', $postUrl, []);

            if ($response) {
                return $response['icons'][0]['url'];
            } else {
                return url('assets/img/no_favicon.png');
            }
        } catch (Exception $e) {
            return url('assets/img/no_favicon.png');
        }
    }

    public static function guzzleApiCall($requestMethod, $url, $bodyData): array
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request($requestMethod, $url, [

            'body' => json_encode($bodyData),

            'headers' => ['Content-Type' => 'application/json'],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public static function generateEmployeeCode($companyName): string
    {
        $prefix = substr(strtoupper($companyName), 0, 3);
        $suffix = rand(1000, 9999);

        return $prefix . $suffix;
    }

    public static function makeGuzzleApiCall($reqJson, $route = 'publish'): bool
    {
        $client = new Client();

        $response = $client->post(env('MQTTURL') . $route, [
            'headers' => [
                'publickey' => env('Publickey'),
                'Content-Type' => 'application/json',
            ],
            'json' => $reqJson,
        ]);

        // Access the response body
        $body = $response->getBody();
        Log::info('body');
        Log::info($body);
        return true;
        // Do something with the response
        // return view('your-view', ['data' => $body]);
    }

    public static function getClientBrowserName()
    {
        $browser = Agent::browser();
        $version = Agent::version($browser);

        return $browser;
    }

    public static function getUserAccessDetails(): array
    {
        $user = Auth::user();
        if ($user->role == 'business') {
            $product = Products::where('scheduleId', $user->id)->get();
            $employeeStrength = $product->sum('employeeStrength');
            $noOfDevices = $product->sum('noOfDevices');
            $noOfApplications = $product->sum('noOfApplications');
            $noOfExtensions = $product->sum('noOfExtensions');

            return [
                "employeeStrength" => $employeeStrength,
                "noOfDevices" => $noOfDevices,
                "noOfApplications" => $noOfApplications,
                "noOfExtensions" => $noOfExtensions
            ];
        }

        if ($user->role == 'user') {

            $product = UserRole::selectRaw(' organization_custom_roles.*')
                ->leftJoin('organization_custom_roles', 'organization_custom_roles.id',  'user_roles.roleId')
                ->where('userId', $user->id)
                ->first();
            return [
                "noOfDevices" => $product ? $product->device : [],
                "noOfApplications" => $product ? (int)$product->numberApplication : 0,
                'numberPassword' => $product ? (int)$product->numberPassword : 0,
                "authentication" => $product ? $product->authentication : [],
                "browser" => $product ? $product->browser : [],
                "application" => $product ? $product->application : []
            ];
        }

        return [];
    }

    public static function getAccessOfApplicationByUrl($inputUrl, $expectedKeys): bool
    {

        $foundMatch = false;

        foreach ($expectedKeys as $key) {
            if (preg_match("/\b$key\b/i", $inputUrl)) {
                // URL contains the current expected key
                $foundMatch = true;
                // You can break the loop if you only want to check for the first match
                break;
            }
        }

        if ($foundMatch) {
            // At least one key was found in the URL
            // Your logic here
            return true;
        } else {
            return false;
            // No expected key was found in the URL
            // Handle the mismatch
        }
    }
}
