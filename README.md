# List of Water Disruption in Selangor
<!---
[![Build Status](https://travis-ci.org/afiqiqmal/selangor-water-disruption.svg?branch=master)](https://travis-ci.org/afiqiqmal/selangor-water-disruption)
[![Coverage](https://img.shields.io/codecov/c/github/afiqiqmal/selangor-water-disruption.svg)](https://codecov.io/gh/afiqiqmal/selangor-water-disruption)
-->

Simple List of Water Disruption in Selangor. This API is based on MySyabas App where i use the endpoint to form this packagist

Tested in PHP 7.1 Only

## Installation

#### Step 1: Install from composer
```
composer require afiqiqmal/selangor-water-disruption
```
Alternatively, you can specify as a dependency in your project's existing composer.json file
```
{
   "require": {
      "afiqiqmal/selangor-water-disruption": "^1.0.0"
   }
}
```

## Usage
After installing, you need to require Composer's autoloader and add your code.

```php
require_once __DIR__ .'/../vendor/autoload.php';
```

#### Sample for All List
```php
$data = air_selangor()
		->getList()
		->fetch();
```

#### Sample for All List by District
```php
$data = air_selangor()
		->getList()
		->byDistrict("20") // byDistrict("20,00,10") // byDistrict(["20","00"])
		->fetch();
```

#### Sample for All Schedule List
```php
$data = air_selangor()
		->getList()
		->schedule() // schedule() or unscheduled()
		->byDistrict("20") // byDistrict("20,00,10") // byDistrict(["20","00"])
		->fetch();
```

#### Sample for All Schedule List by District
```php
$data = air_selangor()
		->getList()
		->schedule() // schedule() or unscheduled()
		->byDistrict("20") // byDistrict("20,00,10") // byDistrict(["20","00"])
		->fetch();
```


#### Sample for See Detail from the list by ID
```php
$data = air_selangor()
        ->unscheduled() // schedule() or unscheduled()  // mandatory
        ->detail("12345")
        ->fetch();
```


## District Guide Code
<b>00</b> => Kuala Lumpur<br>
<b>10</b> => Gombak<br>
<b>20</b> => Petaling<br>
<b>30</b> => Klang<br>
<b>40</b> => Hulu Langat<br>
<b>50</b> => Kuala Langat<br>
<b>60</b> => Hulu Selangor<br>
<b>70</b> => Kuala Selangor<br>
<b>80</b> => Sabak Bernam<br>
<b>90</b> => Sepang<br>



### Result

You should getting data similarly for listing like below:
```json
{
    "code": 200,
    "error": false,
    "info": [
        {
            "code_id": "00",
            "name": "Kuala Lumpur",
            "data": [
                {
                    "id": "5107",
                    "type": 1,
                    "type_name": "Scheduled",
                    "title": "Kerja Pemasangan Injap di Taman Putra dan Taman Muda",
                    "location": null,
                    "affected_areas": "Taman Putra dan Taman Muda\r\n",
                    "affected_areas_filtered": [
                        "Taman Putra dan Taman Muda"
                    ],
                    "start_date": 1526335200,
                    "start_date_formatted": "14/05/2018 10:00 PM",
                    "end_date": 1526446800,
                    "end_date_formatted": "16/05/2018 05:00 AM",
                    "district_id": "00",
                    "district_name": "Kuala Lumpur"
                }
            ],
            "count": 1
        },
        {
            "code_id": "10",
            "name": "Gombak",
            "data": [
                {
                    "id": "25458",
                    "type": 2,
                    "type_name": "Unscheduled",
                    "title": "Paip Pecah - Desa Makmur Batu 10",
                    "location": "Depan Kedai Makan, Jalan Gombak, Desa Makmur Batu 10, Gombak Utara, Selangor.",
                    "affected_areas": "1) Jalan Gombak Batu 9, Batu 10 & Batu 11\r\n2) Lorong Tokman",
                    "affected_areas_filtered": [
                        "1) Jalan Gombak Batu 9, Batu 10 & Batu 11",
                        "2) Lorong Tokman"
                    ],
                    "start_date": 1525685640,
                    "start_date_formatted": "07/05/2018 09:34 AM",
                    "end_date": 0,
                    "end_date_formatted": null,
                    "district_id": "10",
                    "district_name": "Gombak"
                }
            ],
            "count": 1
        },
        {
            "code_id": "20",
            "name": "Petaling",
            "data": [
                {
                    "id": "25460",
                    "type": 2,
                    "type_name": "Unscheduled",
                    "title": "Paip Pecah - Kampung Baru Subang",
                    "location": "Jalan 4D, Kampung Baru Subang",
                    "affected_areas": "Jalan 2D - 10D, Kampung Baru Subang",
                    "affected_areas_filtered": [
                        "Jalan 2D - 10D, Kampung Baru Subang"
                    ],
                    "start_date": 1525693560,
                    "start_date_formatted": "07/05/2018 11:46 AM",
                    "end_date": 0,
                    "end_date_formatted": null,
                    "district_id": "20",
                    "district_name": "Petaling"
                }
            ],
            "count": 1
        },
        {
            "code_id": "30",
            "name": "Klang",
            "data": [
                {
                    "id": "25461",
                    "type": 2,
                    "type_name": "Unscheduled",
                    "title": "Paip Pecah - Taman Klang Utama",
                    "location": "Jalan Sg Keramat 7E, Taman Klang Utama",
                    "affected_areas": "Taman Sg Keramat",
                    "affected_areas_filtered": [
                        "Taman Sg Keramat"
                    ],
                    "start_date": 1525695660,
                    "start_date_formatted": "07/05/2018 12:21 PM",
                    "end_date": 0,
                    "end_date_formatted": null,
                    "district_id": "30",
                    "district_name": "Klang"
                }
            ],
            "count": 1
        },
        {
            "code_id": "40",
            "name": "Hulu Langat",
            "data": [
                {
                    "id": "25459",
                    "type": 2,
                    "type_name": "Unscheduled",
                    "title": "Paip Pecah - Jalan Besar Semenyih",
                    "location": "Stesen Petrol BHP, Jalan Besar Semenyih",
                    "affected_areas": "Kg Baru Cina Semenyih",
                    "affected_areas_filtered": [
                        "Kg Baru Cina Semenyih"
                    ],
                    "start_date": 1525691100,
                    "start_date_formatted": "07/05/2018 11:05 AM",
                    "end_date": 0,
                    "end_date_formatted": null,
                    "district_id": "40",
                    "district_name": "Hulu Langat"
                }
            ],
            "count": 1
        },
        {
            "code_id": "50",
            "name": "Kuala Langat",
            "data": [],
            "count": 0
        },
        {
            "code_id": "60",
            "name": "Hulu Selangor",
            "data": [
                {
                    "id": "5106",
                    "type": 1,
                    "type_name": "Scheduled",
                    "title": "Kerja-kerja penggantian pam air mentah di Loji Rawatan Air Sungai Selisik",
                    "location": null,
                    "affected_areas": "1. Kampung Sungai Nilam/ Kampung Seri Pagi\r\n2. Kampung Lalang Sungai Selisik\r\n3. Rumah Murah Pkt 2 Sungai Selisek\r\n4. Kampung Serigala Sungai Selisek\r\n5. Kampung Orang Asli Serigala Sungai Selisek\r\n6. Kampong Bahom Sungai Selisek\r\n7. Kampong Sekolah, Kuarters Klinik\r\n8. Kampong Gesir Tengah Sungai Selisek",
                    "affected_areas_filtered": [
                        "1. Kampung Sungai Nilam/ Kampung Seri Pagi",
                        "2. Kampung Lalang Sungai Selisik",
                        "3. Rumah Murah Pkt 2 Sungai Selisek",
                        "4. Kampung Serigala Sungai Selisek",
                        "5. Kampung Orang Asli Serigala Sungai Selisek",
                        "6. Kampong Bahom Sungai Selisek",
                        "7. Kampong Sekolah, Kuarters Klinik",
                        "8. Kampong Gesir Tengah Sungai Selisek"
                    ],
                    "start_date": 1526288400,
                    "start_date_formatted": "14/05/2018 09:00 AM",
                    "end_date": 1526353200,
                    "end_date_formatted": "15/05/2018 03:00 AM",
                    "district_id": "60",
                    "district_name": "Hulu Selangor"
                }
            ],
            "count": 1
        },
        {
            "code_id": "70",
            "name": "Kuala Selangor",
            "data": [],
            "count": 0
        },
        {
            "code_id": "80",
            "name": "Sabak Bernam",
            "data": [],
            "count": 0
        },
        {
            "code_id": "90",
            "name": "Sepang",
            "data": [],
            "count": 0
        }
    ],
    "generated_at": "2018-05-07 04:28:07",
    "footer": {
        "source": "Air Selangor MySyabas API",
        "developer": {
            "name": "Hafiq",
            "homepage": "https://github.com/afiqiqmal"
        }
    }
}
```

You should getting data similarly for DETAIL like below:

Schedule Sample
```json
{
    "code": 200,
    "error": false,
    "info": {
        "id": "5106",
        "title": "Kerja-kerja penggantian pam air mentah di Loji Rawatan Air Sungai Selisik",
        "detail": "Para pengguna dinasihatkan agar membuat persediaan dengan menyimpan bekalan air secukupnya bagi menghadapi gangguan bekalan air sementara ini serta menggunakan air secara berhemah sepanjang tempoh gangguan tersebut.<br /><br />Para pengguna yang memerlukan maklumat berhubung kerja-kerja berjadual ini disarankan untuk melayari laman sesawang SYABAS iaitu www.syabas.com.my;atau melayari laman rasmi Twitter &quot;air_selangor&quot;. Pengguna juga boleh memuat turun aplikasi sistem mySYABAS (melalui Google Playstore dan Appstore) untuk mendapatkan maklumat lanjut berhubung gangguan yang berlaku.",
        "detail_plain": "Para pengguna dinasihatkan agar membuat persediaan dengan menyimpan bekalan air secukupnya bagi menghadapi gangguan bekalan air sementara ini serta menggunakan air secara berhemah sepanjang tempoh gangguan tersebut.\n\nPara pengguna yang memerlukan maklumat berhubung kerja-kerja berjadual ini disarankan untuk melayari laman sesawang SYABAS iaitu www.syabas.com.my;atau melayari laman rasmi Twitter \"air_selangor\". Pengguna juga boleh memuat turun aplikasi sistem mySYABAS (melalui Google Playstore dan Appstore) untuk mendapatkan maklumat lanjut berhubung gangguan yang berlaku.",
        "remarks": "",
        "location": null,
        "remarks_plain": "",
        "affected_areas": "1. Kampung Sungai Nilam/ Kampung Seri Pagi<br />2. Kampung Lalang Sungai Selisik<br />3. Rumah Murah Pkt 2 Sungai Selisek<br />4. Kampung Serigala Sungai Selisek<br />5. Kampung Orang Asli Serigala Sungai Selisek<br />6. Kampong Bahom Sungai Selisek<br />7. Kampong Sekolah, Kuarters Klinik<br />8. Kampong Gesir Tengah Sungai Selisek",
        "affected_areas_plain": "1. Kampung Sungai Nilam/ Kampung Seri Pagi\n2. Kampung Lalang Sungai Selisik\n3. Rumah Murah Pkt 2 Sungai Selisek\n4. Kampung Serigala Sungai Selisek\n5. Kampung Orang Asli Serigala Sungai Selisek\n6. Kampong Bahom Sungai Selisek\n7. Kampong Sekolah, Kuarters Klinik\n8. Kampong Gesir Tengah Sungai Selisek",
        "affected_areas_filtered": [
            "1. Kampung Sungai Nilam/ Kampung Seri Pagi",
            "2. Kampung Lalang Sungai Selisik",
            "3. Rumah Murah Pkt 2 Sungai Selisek",
            "4. Kampung Serigala Sungai Selisek",
            "5. Kampung Orang Asli Serigala Sungai Selisek",
            "6. Kampong Bahom Sungai Selisek",
            "7. Kampong Sekolah, Kuarters Klinik",
            "8. Kampong Gesir Tengah Sungai Selisek"
        ],
        "start_date": 1526288400,
        "start_date_formatted": "May 14 2018, 09:00",
        "end_date": 1526353200,
        "end_date_formatted": "May 15 2018, 03:00"
    },
    "generated_at": "2018-05-07 04:29:37",
    "footer": {
        "source": "Air Selangor MySyabas API",
        "developer": {
            "name": "Hafiq",
            "homepage": "https://github.com/afiqiqmal"
        }
    }
}
```

UnSchedule Sample
```json
{
    "code": 200,
    "error": false,
    "info": {
        "id": "25454",
        "title": "Paip Bocor  - Taman Desa Impian",
        "detail": "Paip Bocor ",
        "detail_plain": "Paip Bocor ",
        "location": "Lot 107, Jln Desa Impian 2, Tmn Desa Impian, Kajang",
        "affected_areas": "Desa Impian &amp; Sebahagian Sungai Kantan",
        "affected_areas_plain": "Desa Impian & Sebahagian Sungai Kantan",
        "level_disruption": "Normal",
        "start_date": 1525608000,
        "start_date_formatted": "May 06 2018, 12:00",
        "end_date": 1525629600,
        "end_date_formatted": "May 06 2018, 18:00",
        "timeline": [
            {
                "info": "Bekalan air telah kembali pulih.<br />Pihak kami memohon maaf diatas kesulitan yang dihadapi oleh pengguna sepanjang tempoh gangguan ini. Terima kasih.<br /><br />Tarikh/Masa Kerja Siap : May 06, 2018 08:30 PM",
                "info_plain": "Bekalan air telah kembali pulih.\nPihak kami memohon maaf diatas kesulitan yang dihadapi oleh pengguna sepanjang tempoh gangguan ini. Terima kasih.\n\nTarikh/Masa Kerja Siap : May 06, 2018 08:30 PM",
                "info_time": 1525639980,
                "info_time_formatted": "May 06 2018, 20:53"
            },
            {
                "info": "Kerja-kerja pembaikan siap. Bekalan air telah dibuka pada jam 5.30 petang dengan pemulihan keseluruhan kawasan adalah secara berperingkat. Terima kasih.",
                "info_plain": "Kerja-kerja pembaikan siap. Bekalan air telah dibuka pada jam 5.30 petang dengan pemulihan keseluruhan kawasan adalah secara berperingkat. Terima kasih.",
                "info_time": 1525629780,
                "info_time_formatted": "May 06 2018, 18:03"
            },
            {
                "info": "Kerja-kerja pembaikan sedang giat dijalankan. Bekalan air akan dibuka sejurus kerja-kerja pembaikan siap dengan pemulihan keseluruhan kawasan adalah secara berperingkat. Terima kasih",
                "info_plain": "Kerja-kerja pembaikan sedang giat dijalankan. Bekalan air akan dibuka sejurus kerja-kerja pembaikan siap dengan pemulihan keseluruhan kawasan adalah secara berperingkat. Terima kasih",
                "info_time": 1525610100,
                "info_time_formatted": "May 06 2018, 12:35"
            }
        ]
    },
    "generated_at": "2018-05-06 14:22:38",
    "footer": {
        "source": "Air Selangor MySyabas API",
        "developer": {
            "name": "Hafiq",
            "homepage": "https://github.com/afiqiqmal"
        }
    }
}
```


## Issue
- If Issue happen like the api always return empty [], just let me know =)


## License
Licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Credit
Credit to : MySyabas Air Selangor

