# jumlah-penduduk-jenis-kelamin

[![Join the chat at https://gitter.im/jumlah-penduduk-jenis-kelamin/Lobby](https://badges.gitter.im/jumlah-penduduk-jenis-kelamin/Lobby.svg)](https://gitter.im/jumlah-penduduk-jenis-kelamin/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-jenis-kelamin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-jenis-kelamin/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-jenis-kelamin/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-jenis-kelamin/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-kelamin/v/stable)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-kelamin)
[![Total Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-kelamin/downloads)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-kelamin)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-kelamin/v/unstable)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-kelamin)
[![License](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-kelamin/license)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-kelamin)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-kelamin/d/monthly)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-kelamin)
[![Daily Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-kelamin/d/daily)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-kelamin)


Jumlah penduduk berdasarkan jenis kelamin per Desa/Kelurahan

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/jumlah-penduduk-jenis-kelamin:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/jumlah-penduduk-jenis-kelamin:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/jumlah-penduduk-jenis-kelamin.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\JPJenisKelamin\JPJenisKelaminServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=jumlah-penduduk-jenis-kelamin-assets
$ php artisan vendor:publish --tag=jumlah-penduduk-jenis-kelamin-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/jumlah-penduduk-jenis-kelamin',
    components: {
      main: resolve => require(['./components/views/bantenprov/jumlah-penduduk-jenis-kelamin/DashboardJPJenisKelamin.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Jumlah Penduduk >> Jenis Kelamin"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/jumlah-penduduk-jenis-kelamin',
      components: {
        main: resolve => require(['./components/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Jumlah Penduduk >> Jenis Kelamin"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Jumlah Penduduk >> Jenis Kelamin',
          link: '/dashboard/jumlah-penduduk-jenis-kelamin',
          icon: 'fa fa-angle-double-right'
        }
  ]
},

```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import JPJenisKelamin from './components/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelamin.chart.vue';
Vue.component('echarts-jumlah-penduduk-jenis-kelamin', JPJenisKelamin);

import JPJenisKelaminKota from './components/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminKota.chart.vue';
Vue.component('echarts-jumlah-penduduk-jenis-kelamin-kota', JPJenisKelaminKota);

import JPJenisKelaminTahun from './components/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminTahun.chart.vue';
Vue.component('echarts-jumlah-penduduk-jenis-kelamin-tahun', JPJenisKelaminTahun);

import JPJenisKelaminAdminShow from './components/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminAdmin.show.vue';
Vue.component('admin-view-jumlah-penduduk-jenis-kelamin-tahun', JPJenisKelaminAdminShow);

//== Echarts Angka Partisipasi Kasar

import JPJenisKelaminBar01 from './components/views/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminBar01.vue';
Vue.component('jumlah-penduduk-jenis-kelamin-bar-01', JPJenisKelaminBar01);

import JPJenisKelaminBar02 from './components/views/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminBar02.vue';
Vue.component('jumlah-penduduk-jenis-kelamin-bar-02', JPJenisKelaminBar02);

//== mini bar charts
import JPJenisKelaminBar03 from './components/views/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminBar03.vue';
Vue.component('jumlah-penduduk-jenis-kelamin-bar-03', JPJenisKelaminBar03);

import JPJenisKelaminPie01 from './components/views/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminPie01.vue';
Vue.component('jumlah-penduduk-jenis-kelamin-pie-01', JPJenisKelaminPie01);

import JPJenisKelaminPie02 from './components/views/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminPie02.vue';
Vue.component('jumlah-penduduk-jenis-kelamin-pie-02', JPJenisKelaminPie02);

//== mini pie charts
import JPJenisKelaminPie03 from './components/views/bantenprov/jumlah-penduduk-jenis-kelamin/JPJenisKelaminPie03.vue';
Vue.component('jumlah-penduduk-jenis-kelamin-pie-03', JPJenisKelaminPie03);
```
