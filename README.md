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
      "afiqiqmal/selangor-water-disruptioner": "^1.0"
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
            "data": []
        },
        {
            "code_id": "10",
            "name": "Gombak",
            "data": []
        },
        {
            "code_id": "20",
            "name": "Petaling",
            "data": [
                {
                    "id": "25455",
                    "type": 2,
                    "type_name": "Unscheduled",
                    "title": "Paip Pecah - Seksyen 17",
                    "location": "No 21, Jalan 17/28, Seksyen 17, Petaling Jaya",
                    "affected_areas": "Jalan 17/28, Seksyen 17",
                    "start_date": 1525614180,
                    "start_date_formatted": "May 06 2018, 13:43",
                    "end_date": 0,
                    "end_date_formatted": null,
                    "district_id": "20"
                },
                {
                    "id": "25456",
                    "type": 2,
                    "type_name": "Unscheduled",
                    "title": "Paip Pecah - Paya Jaras Dalam",
                    "location": "Lot 2995, Jalan Rahidin 1, Paya Jaras Dalam",
                    "affected_areas": "Jalan Rahidin 1",
                    "start_date": 1525632540,
                    "start_date_formatted": "May 06 2018, 18:49",
                    "end_date": 0,
                    "end_date_formatted": null,
                    "district_id": "20"
                }
            ]
        },
        {
            "code_id": "30",
            "name": "Klang",
            "data": [
                {
                    "id": "25452",
                    "type": 2,
                    "type_name": "Unscheduled",
                    "title": "paip Pecah - Seksyen 6, Shah Alam",
                    "location": "No.50, Jalan Merbuk 6/1A (Persiaran Dato Menteri, Seksyen 6)",
                    "affected_areas": "Seksyen 7, Shah Alam",
                    "start_date": 1525604100,
                    "start_date_formatted": "May 06 2018, 10:55",
                    "end_date": 0,
                    "end_date_formatted": null,
                    "district_id": "30"
                }
            ]
        },
        {
            "code_id": "40",
            "name": "Hulu Langat",
            "data": [
                {
                    "id": "25454",
                    "type": 2,
                    "type_name": "Unscheduled",
                    "title": "Paip Bocor  - Taman Desa Impian",
                    "location": "Lot 107, Jln Desa Impian 2, Tmn Desa Impian, Kajang",
                    "affected_areas": "Desa Impian & Sebahagian Sungai Kantan",
                    "start_date": 1525610040,
                    "start_date_formatted": "May 06 2018, 12:34",
                    "end_date": 0,
                    "end_date_formatted": null,
                    "district_id": "40"
                }
            ]
        },
        {
            "code_id": "50",
            "name": "Kuala Langat",
            "data": []
        },
        {
            "code_id": "60",
            "name": "Hulu Selangor",
            "data": []
        },
        {
            "code_id": "70",
            "name": "Kuala Selangor",
            "data": []
        },
        {
            "code_id": "80",
            "name": "Sabak Bernam",
            "data": []
        },
        {
            "code_id": "90",
            "name": "Sepang",
            "data": []
        }
    ],
    "generated_at": "2018-05-06 14:21:45",
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

