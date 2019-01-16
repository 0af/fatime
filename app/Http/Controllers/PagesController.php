<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\User;
use GeniusTS\HijriDate\Date;
use GeniusTS\HijriDate\Hijri;
use GeniusTS\HijriDate\Translations\Arabic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public $dateJ = [];
    public $dateG = [];
    public $currenTime = null;
    protected $data = [];

    public function __construct()
    {
        Date::setTranslation(new Arabic());
        $this->currenTime = time();
        $myTime = $this->currenTime;
        $jalaiContainer = explode('-', jdate('b-Y-m-d-H-i-s-M-l-F-p-n-L', $myTime, '', 'Asia/Tehran', 'en'));
        $gregorianContainer = explode('-', date('b-Y-m-d-H-i-s-M-l-F-p-n-L', $myTime));
        $this->dateJ= [
            "b" => $jalaiContainer[0],
            "Y" => $jalaiContainer[1],
            "m" => $jalaiContainer[2],
            "d" => $jalaiContainer[3],
            "H" => $jalaiContainer[4],
            "i" => $jalaiContainer[5],
            "s" => $jalaiContainer[6],
            "M" => $jalaiContainer[7],
            "l" => $jalaiContainer[8],
            "F" => $jalaiContainer[9],
            "p" => $jalaiContainer[10],
            "n" => $jalaiContainer[11],
            "L" => $jalaiContainer[12],
        ];
        $this->dateG = [
            "b" => $gregorianContainer[0],
            "Y" => $gregorianContainer[1],
            "m" => $gregorianContainer[2],
            "d" => $gregorianContainer[3],
            "H" => $gregorianContainer[4],
            "i" => $gregorianContainer[5],
            "s" => $gregorianContainer[6],
            "M" => $gregorianContainer[7],
            "l" => $gregorianContainer[8],
            "F" => $gregorianContainer[9],
            "p" => $gregorianContainer[10],
            "n" => $gregorianContainer[11],
            "L" => $gregorianContainer[12],
        ];
        $hijriDate = Hijri::convertToHijri(date('Y-m-d', $myTime ));
        $dateJ = $this->dateJ;
        $dateG = $this->dateG;
        $currenSeason = $dateJ["b"];
        $currentDateForHours = $dateG["Y"] . "-" . $dateG["m"] . "-" . $dateG["d"] . 'T' . $dateG["H"] . ":" . $dateG["i"] . ":" . $dateG["s"] . '+03:30';
        $timeZone = '+03:30';
        if ($currenSeason <= 2) {
            $currentDateForHours = $dateG["Y"] . "-" . $dateG["m"] . "-" . $dateG["d"] . 'T' . $dateG["H"] . ":" . $dateG["i"] . ":" . $dateG["s"] . '+04:30';
            $timeZone = '+04:30';
        }
        $this->data = [
            "currentDateForHours" => $currentDateForHours,
            "timeZone" => $timeZone,
            "currentDate" => $dateJ["Y"] . "/" . $dateJ["m"] . "/" . $dateJ["d"],
            "currentGDate" => $dateG["Y"] . "/" . $dateG["m"] . "/" . $dateG["d"],
            "currentGhDate" => $hijriDate->format('Y/m/d'),
            "currentGhamariMonthName" => $hijriDate->format('F'),
            "currentGhamariYear" => $hijriDate->format('Y'),
            "currentGhamariDate" =>  $hijriDate->format('l ,d F Y'),
            "currentGregorianDateStr" => $dateG["l"] . ", ".$dateG["M"] . " " . $dateG["d"] . ", " . $dateG["Y"],
            "currentJalaliDate" => $dateJ["l"] . ", ".$dateJ["d"] . " " . $dateJ["F"] . ", " . $dateJ["Y"],
            "currentDayNumber" => $dateJ["d"],
            "currentPSymbol" => $dateJ["p"],
            "currentMonthNumber" => $dateJ["n"],
            "yearIsLeep" => $dateJ["L"],
            "currentGregorianDate" => $dateG["Y"] . "-" . $dateG["m"] . "-" . $dateG["d"],
            "currentJalaliMonthName" => $dateJ["F"],
            "currentGregorianMonthName" => $dateG["F"],
            "currentJalaliYear" => $dateJ["Y"],
            "currentJalaliMonth" => $dateJ["m"],
            "currentGregorianYear" => $dateG["Y"],
            "currentHours" => $dateJ["H"],
            "currentMinutes" => $dateJ["i"],
            "currentSecond" => $dateJ["s"],
        ];
    }

    public function index()
    {
        $data = $this->data;
        return view('pages.index',compact('data'));
    }

    public function getCalendar($year, $month)
    {
        $input = ["year" => $year, "month" => $month];
        $validator = Validator::make($input, [
            'year' => 'required|numeric',
            'month' => 'required|numeric|between:1,12',
        ]);
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator);
        }
        $out = [
            "currentJalaliMonthName" => jdate('F',jmktime(0,0,0, $month,1,$year)),
            "currentJalaliYear" => jdate('Y',jmktime(0,0,0, $month,1,$year)),
            "currentGregorianMonthName" => date('F',jmktime(0,0,0, $month,1,$year)),
            "currentGregorianYear" => date('Y',jmktime(0,0,0, $month,1,$year)),
            "currentGhamariMonthName" => Hijri::convertToHijri(date('Y-m-d',(jmktime(0,0,0, $month,1,$year))))->format('F'),
            "currentGhamariYear" => Hijri::convertToHijri(date('Y-m-d',(jmktime(0,0,0, $month,1,$year) )))->format('Y'),
        ];
        $ghamaMonthContainer = [];
        $gregorianMonthContainer = [];
        $monthPeriod = jdate('t', jmktime(0,0,0, $month,1,$year),'','Asia/Tehran','en');
        $dayOfWeek = jdate('w', jmktime(0,0,0, $month,1,$year),'','Asia/Tehran','en');
        $lastYear = jdate('Y', jmktime(0,0,0, $month,1,$year),'','Asia/Tehran','en');
        $nextYear = jdate('Y', jmktime(0,0,0, $month,1,$year),'','Asia/Tehran','en');
        $lastMonth = $month;
        $lastMonth--;
        if ((((int)$month) <= 1)) {
            $lastMonth= 12;
            $lastYear--;
        }else if(((int)$month) > 12){
            $lastMonth= 1;
        }
        $nextMonth = $month;
        $nextMonth++;
        if ((((int)$month) <= 1)) {
            $nextMonth= 2;
        }else if(((int)$month) >= 12){
            $nextMonth= 1;
            $nextYear++;
        }
        $lastMonthPeriod = jdate('t', jmktime(0,0,0, $lastMonth,1,$lastYear),'','Asia/Tehran','en');
        for ($i=--$dayOfWeek;$i >= 0; $i--) {
            $lastGhamriMonth = Hijri::convertToHijri(date('Y-m-d', (jmktime(0,0,0, $lastMonth,$lastMonthPeriod - $i,$lastYear) )));
            $lastJalaliMonth =  explode("-", jdate('Y-m-d',jmktime(0,0,0, $lastMonth,$lastMonthPeriod - $i,$lastYear),'','Asia/Tehran','en'));
            $lastGregorianMonth =  explode("-", date('Y-m-d',jmktime(0,0,0, $lastMonth,$lastMonthPeriod - $i,$lastYear)));
            $out["calendar"][] = [
                "dayJalali" => (int) $lastJalaliMonth[2],
                "dayGregorian" => (int)$lastGregorianMonth[2],
                "dayGhamari" => (int)$lastGhamriMonth->format('d'),
                "notCurrentMonth" => true
            ];
        }
        for ($i=1;$i <= $monthPeriod;$i++) {
            $currentGhamriMonth = Hijri::convertToHijri(date('Y-m-d', (jmktime(0,0,0, $month,$i,$year) )));
            $currentJalaliMonth =  explode("-", jdate('Y-m-d',jmktime(0,0,0, $month,$i,$year),'','Asia/Tehran','en'));
            $currentGregorianMonth =  explode("-", date('Y-m-d',jmktime(0,0,0, $month,$i,$year)));
            if (jdate('Y-m-d', jmktime(0, 0, 0, $month, $i, $year)) == jdate('Y-m-d', jmktime(0, 0, 0, jdate("m",time()), jdate("d",time()), jdate("Y",time())))) {
                $out["calendar"][] = [
                    "dayJalali" => (int) $currentJalaliMonth[2],
                    "monthJalali" => (int) $currentJalaliMonth[1],
                    "dayGregorian" => (int)$currentGregorianMonth[2],
                    "monthGregorian" => (int)$currentGregorianMonth[1],
                    "dayGhamari" => (int)$currentGhamriMonth->format('d'),
                    "monthGhamari" => (int)$currentGhamriMonth->format('m'),
                    "currentDay" => true
                ];
                if (! in_array((int)$currentGhamriMonth->format('m'), $ghamaMonthContainer)) {
                    $ghamaMonthContainer[] = (int)$currentGhamriMonth->format('m');
                }
                if (! in_array((int)$currentGregorianMonth[1], $gregorianMonthContainer)) {
                    $gregorianMonthContainer[] =(int)$currentGregorianMonth[1];
                }
            }else{
                $out["calendar"][] = [
                    "dayJalali" => (int) $currentJalaliMonth[2],
                    "monthJalali" => (int) $currentJalaliMonth[1],
                    "dayGregorian" => (int)$currentGregorianMonth[2],
                    "monthGregorian" => (int)$currentGregorianMonth[1],
                    "dayGhamari" => (int)$currentGhamriMonth->format('d'),
                    "monthGhamari" => (int)$currentGhamriMonth->format('m'),
                ];
                if (! in_array((int)$currentGhamriMonth->format('m'), $ghamaMonthContainer)) {
                    $ghamaMonthContainer[] = (int)$currentGhamriMonth->format('m');
                }
                if (! in_array((int)$currentGregorianMonth[1], $gregorianMonthContainer)) {
                    $gregorianMonthContainer[] =(int)$currentGregorianMonth[1];
                }
            }
            $nextMonthdayOfWeek = jdate('w', jmktime(0,0,0, $month,$i,$year),'','Asia/Tehran','en');
        }

        for ($i= 1; $i <= (6-$nextMonthdayOfWeek);$i++) {
            $nextGhamriMonth = Hijri::convertToHijri(date('Y-m-d', (jmktime(0,0,0, $nextMonth,$i,$nextYear))));
            $nextJalaliMonth =  explode("-", jdate('Y-m-d',jmktime(0,0,0, $nextMonth,$i,$nextYear),'','Asia/Tehran','en'));
            $nextGregorianMonth =  explode("-",date('Y-m-d',jmktime(0,0,0, $nextMonth,$i,$nextYear)));
            $out["calendar"][] = [
                "dayJalali" => (int) $nextJalaliMonth[2],
                "dayGregorian" => (int)$nextGregorianMonth[2],
                "dayGhamari" => (int)$nextGhamriMonth->format('d'),
                "notCurrentMonth" => true
                ];
        }
        $event["jalali"][(string)((int)$month)] = Calendar::where(
            [
                ["type", "=", "jalali"],
                ["month", "=", (string)((int)$month)],
            ]
        )->get();
        foreach ($gregorianMonthContainer as $gregorianMonth) {
            $tmpEvent = Calendar::where(
                [
                    ["type", "=", "gregorian"],
                    ["month", "=", (string)((int)$gregorianMonth)],
                ]
            )->get();
            if (count($tmpEvent) > 0) {
                $event["gregorian"][(string)((int)$gregorianMonth)] = $tmpEvent;
            }
        }
        foreach ($ghamaMonthContainer as $ghamaiMonth) {
            $tmpEvent = Calendar::where(
                [
                    ["type", "=", "ghamari"],
                    ["month", "=", (string)((int)$ghamaiMonth)],
                ]
            )->get();
            if (count($tmpEvent) > 0) {
                $event["ghamari"][(string)((int)$ghamaiMonth)] = $tmpEvent;
            }
        }
        $out['event'] =  $event;
        return $out;
    }

    public function getCurrentDate()
    {
        $dateJ = $this->dateJ;
        $dateG = $this->dateG;
        $timeZoneTmp = ($dateJ["b"] <= 2) ? '+04:30' : '+03:30';
        $currentDateForHoursTmp =  ($dateJ["b"] <= 2) ?
            $dateG["Y"] . "-" . $dateG["m"] . "-" . $dateG["d"] . 'T' . $dateG["H"] . ":" . $dateG["i"] . ":" . $dateG["s"] . '+04:30':
            $dateG["Y"] . "-" . $dateG["m"] . "-" . $dateG["d"] . 'T' . $dateG["H"] . ":" . $dateG["i"] . ":" . $dateG["s"] . '+03:30'
            ;
        return [
            "currentGregorianDate" => $dateG["Y"] . "-" . $dateG["m"] . "-" . $dateG["d"],
            "currentHours" => $dateJ["H"],
            "currentMinutes" => $dateJ["i"],
            "currentSecond" => $dateJ["s"],
            "timeZone" => $timeZoneTmp,
            "currentDateForHours" => $currentDateForHoursTmp,
        ];
    }

    public function getOwghat($x, $y)
    {
        $input = ["x" => $x, "y" => $y];
        $validator = Validator::make($input, [
            'x' => 'required|numeric',
            'y' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator);
        }
        $dateJ = $this->dateJ;
        $currentMonth = $dateJ["m"];
        $currentDay =$dateJ["d"];
        $owghat = owghat($currentMonth, $currentDay, $x, $y, 0,1,1);
        return [
            "s" => $owghat['s'],
            "t" => $owghat['t'],
            "z" => $owghat['z'],
            "g" => $owghat['g'],
            "m" => $owghat['m'],
            "n" => $owghat['n'],
        ];
    }

    public function convertDate($convertType, $year, $month, $day)
    {
        $input = ["type" => $convertType, "year" => $year, "month" => $month, "day" => $day];
        $validator = Validator::make($input, [
            'type' => 'required|numeric|between:1,3',
            'year' => 'required|numeric',
            'month' => 'required|numeric|between:1,12',
            'day' => 'required|numeric|between:1,31',
        ]);
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator);
        }
        $gregorianEnterDate = [(int)$year, (int)$month, (int)$day];
        if ($convertType === "1") {
            $gregorianEnterDate = jalali_to_gregorian($year, $month, $day);
        } elseif ($convertType === "3") {
            $ghamariEnterDate = Hijri::convertToGregorian((int)$day, (int)$month, (int)$year);
            $gregorianEnterDate = [ $ghamariEnterDate->year, $ghamariEnterDate->month, $ghamariEnterDate->day];
        }
        $gregorianToShamsi = gregorian_to_jalali($gregorianEnterDate[0], $gregorianEnterDate[1], $gregorianEnterDate[2]);
        $shamsiContainer= explode('-', jdate('Y-l-d-F-p-L-m', jmktime(0,0,0, $gregorianToShamsi[1],$gregorianToShamsi[2],$gregorianToShamsi[0]),'','Asia/Tehran','en'));
        $gregorianContainer= explode('-', date('Y-l-d-F-p-L-m-M', strtotime($gregorianEnterDate[0] . "-" . $gregorianEnterDate[1] . "-". $gregorianEnterDate[2])));
        $ghamariContainer = Hijri::convertToHijri(date('Y-m-d',strtotime($gregorianEnterDate[0] . "-" . $gregorianEnterDate[1] . "-". $gregorianEnterDate[2])));
        $startDate = new \DateTime($this->dateG['Y'] . "-" . $this->dateG['m'] . "-" . $this->dateG['d']);
        $endDate = new \DateTime($gregorianContainer[0] . "-" . $gregorianContainer[6] . "-" . $gregorianContainer[2]);
        $interval = $startDate->diff($endDate);
        $currentTimeStamp = jmktime(0,0,0,$this->dateJ['m'],$this->dateJ['d'],$this->dateJ['Y']);
        $inputTimeStamp = jmktime(0,0,0,$shamsiContainer[6],$shamsiContainer[2],$shamsiContainer[0]);
        $distanceState = 0;
        if($currentTimeStamp > $inputTimeStamp){
            $distanceState = -1;
        } elseif ($currentTimeStamp < $inputTimeStamp) {
            $distanceState = 1;
        }
        return [
            "shamsi" => $shamsiContainer[1] . ", " . $shamsiContainer[2] . $shamsiContainer[3] . ", " .  $shamsiContainer[0],
            "yearShamsi" => $shamsiContainer[0],
            "shamsiDate" => $shamsiContainer[0] . "/" . $shamsiContainer[6] . "/" . $shamsiContainer[2],
            "gregorian" => $gregorianContainer[1] . ", " . $gregorianContainer[7] . $gregorianContainer[2] . ", " .  $gregorianContainer[0],
            "gregorianDate" => $gregorianContainer[0] . "/" . $gregorianContainer[6] . "/" . $gregorianContainer[2],
            "ghamari" => $ghamariContainer->format('l ,d F Y'),
            "ghamariDate" => $ghamariContainer->format('Y/m/d'),
            "pSymbol" => $shamsiContainer[4],
            "yearLeep" => $shamsiContainer[5],
            "distanceState" => $distanceState,
            "distanceYear" => (int)$interval->format('%y'),
            "distanceMonth" => (int)$interval->format('%m'),
            "distanceDay" => (int)$interval->format('%d'),

        ];
    }

    public function setTimeZone()
    {
        $data = $this->data;
        return view('pages.set-time', compact('data'));
    }

    public function showWaether($city)
    {
        $cityList = [
            "207170",
            "207163",
            "206973",
            "207190",
            "207166",
            "207274",
            "207213",
            "207291",
            "207268",
            "207303",
            "207279",
            "207171",
            "207160",
            "207294",
            "207173",
            "207159",
            "207271",
            "207249",
            "207147",
            "207097",
            "207122",
            "207059",
            "207136",
            "209485",
            "207148",
            "207075",
            "207125",
            "207113",
            "207066",
            "207108",
            "207063",
            "207062",
            "207055",
            "206976",
            "206970",
            "206956",
            "206953",
            "206964",
            "206967",
            "206974",
            "206968",
            "206969",
            "206952",
            "208080",
            "208194",
            "208175",
            "208118",
            "208095",
            "208092",
            "207981",
            "208039",
            "207980",
            "207978",
            "208086",
            "208125",
            "208087",
            "208073",
            "207984",
            "208171",
            "207968",
            "208003",
            "208013",
            "208165",
            "208057",
            "208070",
            "208071",
            "208093",
            "211306",
            "211367",
            "208966",
            "208937",
            "208956",
            "208952",
            "208948",
            "208959",
            "207387",
            "207496",
            "207439",
            "207419",
            "207493",
            "211318",
            "211328",
            "210841",
            "211304",
            "211302",
            "211338",
            "211326",
            "211307",
            "211308",
            "211316",
            "207538",
            "207550",
            "207573",
            "207567",
            "207543",
            "207568",
            "207571",
            "207569",
            "209740",
            "209805",
            "209807",
            "209628",
            "209664",
            "209738",
            "209613",
            "209647",
            "209609",
            "209607",
            "209525",
            "209669",
            "209737",
            "209467",
            "209481",
            "210047",
            "209906",
            "210057",
            "210056",
            "209981",
            "209935",
            "209991",
            "209997",
            "209911",
            "209912",
            "209920",
            "209937",
            "209984",
            "211696",
            "211695",
            "211728",
            "211676",
            "211685",
            "210905",
            "210967",
            "210904",
            "210974",
            "211096",
            "527266",
            "211007",
            "211111",
            "211010",
            "211207",
            "211124",
            "211085",
            "211126",
            "211081",
            "211117",
            "211118",
            "208230",
            "208205",
            "208217",
            "208212",
            "208223",
            "208305",
            "208367",
            "208214",
            "208482",
            "208384",
            "208333",
            "208332",
            "208383",
            "208389",
            "208538",
            "208387",
            "208358",
            "208206",
            "208324",
            "208220",
            "208371",
            "208442",
            "208446",
            "378067",
            "210801",
            "210816",
            "1948324",
            "210842",
            "210155",
            "210180",
            "210161",
            "210185",
            "210159",
            "209213",
            "209215",
            "209141",
            "209221",
            "209237",
            "209238",
            "209113",
            "209249",
            "209245",
            "209225",
            "209333",
            "209234",
            "209235",
            "209236",
            "209428",
            "209429",
            "209380",
            "209389",
            "209411",
            "209430",
            "209388",
            "209402",
            "209403",
            "210109",
            "210096",
            "208675",
            "208691",
            "208681",
            "208708",
            "208642",
            "208644",
            "208612",
            "208602",
            "208653",
            "208654",
            "208613",
            "208598",
            "208601",
            "208628",
            "208638",
            "210272",
            "210279",
            "210292",
            "210535",
            "210536",
            "210526",
            "2311095",
            "210528",
            "210521",
            "210530",
            "210554",
            "210434",
            "210397",
            "210422",
            "210429",
            "210377",
            "210410",
            "210376",
            "210405",
            "208929",
            "208841",
            "208774",
            "208892",
            "208851",
            "208926",
            "208714",
            "208735",
            "208751",
            "208716",
            "208760",
            "211600",
            "211616",
            "211595",
            "211542",
            "211546",
            "211598",
            "211610",
            "211668"
        ];
        $useApi = 0;
        $apiList = [
            '4UDTbAQYL2oMWswBYmM19kjbFU1GoIPj',
            'GjdBeArRCkgPgFr3bzGuWwsRJNGkVVA6',
            'WhTvdkPZ5aYVwEynlNBlrObReu4pLUhL',
            'cJ0eLi7BWHXXGpANNc6eerlLhR6RoGcS',
            'EHckX5Gc9Uk0QflRpl3FkvomWTrwWnVF',
            'N2scVYL2G0pQxLUdjdVd97HtCoHimOop',
        ];
        $useApiCount = count($apiList) - 1;
        if (!in_array($city, $cityList)) {
            return ["status" => "404"];
        };
        checkWeather:
        $dataToStore = [];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://dataservice.accuweather.com/currentconditions/v1/$city?apikey=" . $apiList[$useApi] . "&language=fa&details=true");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        $data =  (array)json_decode($data);
        if ($data == false || empty($data) || isset($data["Code"])) {
            if ($useApi >= $useApiCount) {
                return ["status" => "503"];
            }
            $useApi++;
            goto checkWeather;
        }
        if (! Cache::has($city)) {
            $data = file_get_contents("http://dataservice.accuweather.com/currentconditions/v1/$city?apikey=" . $apiList[$useApi] . "&language=fa&details=true");
            $data =  (array)json_decode($data);
            $dataToStore =  [
                "status" => "200",
                "Temperature" => $data[0]->Temperature->Metric->Value,
                "WeatherText" => $data[0]->WeatherText,
                "WeatherIcon" => $data[0]->WeatherIcon
            ];
            $expiresAt = now()->addMinutes(720);
            Cache::store('file')->put($city, $dataToStore,$expiresAt);
        }else{
            $dataToStore = Cache::get($city);
        }
        return $dataToStore;
    }
}
