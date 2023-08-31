@extends ('layouts.layout')

@section('content')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    {{-- search --}}
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css"
        type="text/css">
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            {{-- View Pengguna --}}
            @if (auth()->user()->hak_akses == 'pengguna')
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Maps</h2>

                    {{-- <a href="{{ route('maps.lihat') }}" type="button" class="btn btn-primary btn-sm mb-5" style="background: #233EAE">Data Maps</a> --}}
                    <!--end::Title-->
                </div>
            @endif
            {{-- End View Pengguna --}}

            {{-- View Admin --}}
            @if (auth()->user()->hak_akses == 'admin')
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Maps</h2>

                    <a href="{{ route('maps.lihat') }}" type="button" class="btn btn-primary btn-sm mb-5"
                        style="background: #233EAE">Data Maps</a>
                    <!--end::Title-->
                </div>
            @endif
            {{-- End View Admin --}}

            {{-- View p2k3 --}}
            @if (auth()->user()->hak_akses == 'p2k3' ||
                    auth()->user()->hak_akses == 'k3_departemen' ||
                    auth()->user()->hak_akses == 'pimpinan')
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Maps</h2>

                    <a href="{{ route('maps.lihat') }}" type="button" class="btn btn-primary btn-sm mb-5"
                        style="background: #233EAE">Data Maps</a>
                    <!--end::Title-->
                </div>
            @endif
            {{-- End View P2K3 --}}
            <!--begin::Content container-->
            <div class="card-body">
                <div id='map'></div>


                <!--end::Content container-->
            </div>
        </div>
    @stop

    @section('custom-css')
        <style>
            #map {
                height: 800px;
                width: 100%;
                margin: 3rem auto;
            }

            /* --------background popup--------------- */
            .mapboxgl-popup-content {
                z-index: 401;
                border-radius: 0;
                max-width: 300px;
                min-width: 200px;
                background-color: rgba(0, 0, 0, 0.8);
                padding: 0;
            }

            .mapboxgl-popup-anchor-bottom .mapboxgl-popup-tip {
                align-self: center;
                border-bottom: none;
                border-top-color: rgba(0, 0, 0, 0.8);
            }

            /* ----------header------------------ */
            .list-popup h1 {
                line-height: 2.2em;
                padding-top: 8px;
            }

            .list-popup .list-item,
            .mapboxgl-popup-content .list-item:hover {
                background-color: rgb(88, 88, 88);
            }

            .list-popup h1,
            .mapboxgl-popup-content h1 {
                font-size: 1.1em;
                line-height: 2em;
                padding: 7px 36px 7px 3%;
                text-align: left;
                color: white;
                margin-bottom: 0;
                min-height: 1.8em;
                z-index: 401;
                background-color: #000;
                cursor: default;
            }


            .list-popup .list-item,
            .mapboxgl-popup-content .list-item {
                display: inline-block;
                -webkit-appearance: none;
                border-radius: 0;
                border: none;
                position: relative;
                cursor: pointer;
                font-size: 1em;
                color: white;
                background: none;
                text-align: left;
                padding-left: 3%;
                width: 100%;
                height: 30px;
                line-height: 30px;
                white-space: normal;
                vertical-align: middle;
                overflow: hidden;
                box-sizing: border-box;
            }

            .mapboxgl-popup-close-button {
                font-size: 16px !important;
                line-height: 18px;
                position: absolute;
                top: 0;
                right: 0;
                margin: 9px 7px;
                padding: 0;
                text-align: center;
                font: 20px Tahoma, Verdana, sans-serif;
                color: #c3c3c3;
                text-decoration: none;
                font-weight: bold;
                border: 2px solid #c3c3c3;
                height: 24px;
                width: 22px;
                line-height: 20px;
                box-sizing: border-box;
                border-radius: 25%;
                cursor: pointer;
            }

            #mapsimg {
                color: black;
                position: absolute;
                width: 18px;
                height: 18px;
                right: 7px;
                top: 6px;
            }
        </style>
    @stop

    @section('customscript')
        <script>
            mapboxgl.accessToken =
                'pk.eyJ1IjoiZGltYXNhbGRpIiwiYSI6ImNrc3VtM3Q1czBqbDIyd3MxOTY5Zmt2djEifQ.OHesyN9CgouizbiRA9QuKA';
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [110.4397221, -7.0514311],
                zoom: 17,
                maxZoom: 19

            });


            // ---------------------------------search---------------------------------
            const customData = {
                'features': [{
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Perkapalan'
                        },
                        'geometry': {
                            'coordinates': [110.43995208761214, -7.050757197977205],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Industri'
                        },
                        'geometry': {
                            'coordinates': [110.44141505155751, -7.051175905842363],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Arsitektur Gedung A'
                        },
                        'geometry': {
                            'coordinates': [110.4386266554756, -7.0514368115039705],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Arsitektur Gedung B'
                        },
                        'geometry': {
                            'coordinates': [110.43841476566195, -7.051145460911461],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Arsitektur Gedung C'
                        },
                        'geometry': {
                            'coordinates': [110.43817292845499, -7.051551920116487],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Arsitektur Gedung D'
                        },
                        'geometry': {
                            'coordinates': [110.43799372661063, -7.051042662965483],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Dekanat Fakultas Teknik'
                        },
                        'geometry': {
                            'coordinates': [110.43858712094622, -7.05059540783121],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Gedung Kuliah Bersama (GKB)'
                        },
                        'geometry': {
                            'coordinates': [110.44027707962385, -7.050573118819528],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Perencanaan Wilayan dan Kota (PWK) Gedung A'
                        },
                        'geometry': {
                            'coordinates': [110.43908010875005, -7.051365712079983],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Perencanaan Wilayan dan Kota (PWK) Gedung A'
                        },
                        'geometry': {
                            'coordinates': [110.43894070804863, -7.050990200424679],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Elektro Gedung A'
                        },
                        'geometry': {
                            'coordinates': [110.44004933265097, -7.0498219866558145],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Elektro Gedung B'
                        },
                        'geometry': {
                            'coordinates': [110.4394286925247, -7.050242198492015],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Geologi'
                        },
                        'geometry': {
                            'coordinates': [110.43941696833167, -7.052399838697005],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Kimia Gedung A'
                        },
                        'geometry': {
                            'coordinates': [110.44117489871748, -7.052044054671596],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Kimia Gedung B'
                        },
                        'geometry': {
                            'coordinates': [110.44116759587276, -7.052431694959633],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Kimia Gedung C'
                        },
                        'geometry': {
                            'coordinates': [110.44095459933877, -7.053123199727869],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Lab. Kimia Dasar'
                        },
                        'geometry': {
                            'coordinates': [110.44114990151887, -7.051724335370081],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Lab. Kimia Pengolahan Limbah'
                        },
                        'geometry': {
                            'coordinates': [110.44119894162314, -7.051819313728907],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Sipil Gedung A'
                        },
                        'geometry': {
                            'coordinates': [110.4389737422591, -7.053156466583636],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Sipil Gedung B & C'
                        },
                        'geometry': {
                            'coordinates': [110.4389486382442, -7.052902339286147],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Sipil Gedung D'
                        },
                        'geometry': {
                            'coordinates': [110.43865877325648, -7.052453990326003],
                            'type': 'Point'
                        }
                    },
                    {
                        'type': 'Feature',
                        'properties': {
                            'title': 'Teknik Sipil Gedung D'
                        },
                        'geometry': {
                            'coordinates': [110.43907038987942, -7.052238426206088],
                            'type': 'Point'
                        }
                    },


                ],
                'type': 'FeatureCollection'
            };

            function forwardGeocoder(query) {
                const matchingFeatures = [];
                for (const feature of customData.features) {
                    // Handle queries with different capitalization
                    // than the source data by calling toLowerCase().
                    if (
                        feature.properties.title
                        .toLowerCase()
                        .includes(query.toLowerCase())
                    ) {
                        // Add a tree emoji as a prefix for custom
                        // data results using carmen geojson format:
                        // https://github.com/mapbox/carmen/blob/master/carmen-geojson.md
                        feature['place_name'] = `🎓 ${feature.properties.title}`;
                        feature['center'] = feature.geometry.coordinates;
                        feature['place_type'] = ['park'];
                        matchingFeatures.push(feature);
                    }
                }
                return matchingFeatures;
            }

            // Add the control to the map.
            map.addControl(
                new MapboxGeocoder({
                    accessToken: mapboxgl.accessToken,
                    localGeocoder: forwardGeocoder,
                    zoom: 18,
                    placeholder: 'Search',
                    mapboxgl: mapboxgl
                })
            );

            // --------------zoom in zoom out-----------------------------
            map.addControl(new mapboxgl.NavigationControl());




            // -------------------Teknik Perkapalan------------------------

            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('teknik-perkapalan', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine.
                            'coordinates': [
                                [
                                    [
                                        110.43981201946735,
                                        -7.050607620437471
                                    ],
                                    [
                                        110.43988510966301,
                                        -7.050733729187049
                                    ],
                                    [
                                        110.43980430811642,
                                        -7.050776652737791
                                    ],
                                    [
                                        110.43987337499856,
                                        -7.050897770332358
                                    ],
                                    [
                                        110.43995082378387,
                                        -7.050853515830318
                                    ],
                                    [
                                        110.44001787900925,
                                        -7.050971638739872
                                    ],
                                    [
                                        110.44013891369104,
                                        -7.050902761441353
                                    ],
                                    [
                                        110.43993070721626,
                                        -7.050540739529959
                                    ],
                                    [
                                        110.43981201946735,
                                        -7.050607620437471
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-kapal',
                    'type': 'fill-extrusion',
                    'source': 'teknik-perkapalan', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-kapal', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Kapal</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_kapal" class="list-item inside" onclick="floor_kapal()">Lantai Teknik Kapal</button>
            <div style="display: none" id="showhide_kapal">
            @foreach ($maps as $item)
            @if ($item->gedung == 'Teknik Perkapalan')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>

            `)

                        .addTo(map);
                    document.getElementById('fly_kapal').addEventListener('click', () => {
                        map.fitBounds([
                            [110.439917, -
                                7.05071850
                            ], // southwestern corner of the bounds -7.050718500263844, 110.43991719904835
                            [110.440011, -7.05084652], // northeastern corner of the bounds
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-kapal', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-kapal', () => {
                    map.getCanvas().style.cursor = '';
                });
            });




            // -------------------Industri------------------------
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('teknik-industris', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44117403203899,
                                        -7.051239411082662
                                    ],
                                    [
                                        110.44157885044007,
                                        -7.051036099855935
                                    ],
                                    [
                                        110.44162007427803,
                                        -7.051067826525767
                                    ],
                                    [
                                        110.44169837240139,
                                        -7.051103861964577
                                    ],
                                    [
                                        110.4416676292563,
                                        -7.051194289733317
                                    ],
                                    [
                                        110.44161934949301,
                                        -7.051169500573465
                                    ],
                                    [
                                        110.44123730646845,
                                        -7.051367688324689
                                    ],
                                    [
                                        110.44117403203899,
                                        -7.051239411082662
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-industri',
                    'type': 'fill-extrusion',
                    'source': 'teknik-industris', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-industri', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Industri</h1><div class="list-item feedback">Detail APAR & P3K</div>
                <button id="fly_industri" class="list-item inside" onclick="floor_industri()">Lantai Teknik Industri</button>
                <div style="display: none" id="showhide_industri">
                @foreach ($maps as $item)
                @if ($item->gedung == 'Teknik Industri')
                <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                @endif
                @endforeach
                </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_industri').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44142729810034, -
                                7.051185046040615
                            ], // southwestern corner of the bounds -7.050718500263844, 110.43991719904835
                            [110.44155450155495, -
                                7.051113818088439
                            ], // northeastern corner of the bounds
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-industri', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-industri', () => {
                    map.getCanvas().style.cursor = '';
                });
            });




            //----------------------Arsitektur---------------------
            //---------gedung A-----------
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('teknik-arsitekturs-gedung-a', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.4386047046387,
                                        -7.051598618613015
                                    ],
                                    [
                                        110.43862348010165,
                                        -7.0515620172015465
                                    ],
                                    [
                                        110.43867578317692,
                                        -7.051585309009185
                                    ],
                                    [
                                        110.4387039463713,
                                        -7.051525415787189
                                    ],
                                    [
                                        110.43873814453592,
                                        -7.051540721833553
                                    ],
                                    [
                                        110.4388005058949,
                                        -7.051401636437235
                                    ],
                                    [
                                        110.4385503899067,
                                        -7.051289835705604
                                    ],
                                    [
                                        110.43848132302521,
                                        -7.051436906900548
                                    ],
                                    [
                                        110.4385362606548,
                                        -7.051462262039715
                                    ],
                                    [
                                        110.4385134618784,
                                        -7.051514169506289
                                    ],
                                    [
                                        110.43854162507279,
                                        -7.0515268136318765
                                    ],
                                    [
                                        110.43852419071435,
                                        -7.051563415046118
                                    ],
                                    [
                                        110.4386047046387,
                                        -7.051598618613015
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-arsitektur-gedung-a',
                    'type': 'fill-extrusion',
                    'source': 'teknik-arsitekturs-gedung-a', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-arsitektur-gedung-a', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Arsitektur Gedung A</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_arsitektur_gedung_a" class="list-item inside" onclick="floor_arsitektur_gedung_a()">Lantai Teknik Arsitektur Gedung A</button>
            <div style="display: none" id="showhide_arsitektur_gedung_a">
            @foreach ($maps as $item)
            @if ($item->gedung == 'Teknik Arsitektur Gedung A')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_arsitektur_gedung_a').addEventListener('click', () => {
                        map.fitBounds([
                            [110.4386441622901, -
                                7.051430638214809
                            ], // -7.051430638214809, 110.4386441622901
                            [110.43862270461872, -
                                7.051455926470208
                            ], // -7.051455926470208, 110.43862270461872
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-arsitektur-gedung-a', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-arsitektur-gedung-a', () => {
                    map.getCanvas().style.cursor = '';
                });
            });




            //--------------gedung B------------
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('teknik-arsitekturs-gedung-b', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43838985218468,
                                        -7.051296730946362
                                    ],
                                    [
                                        110.43854414011429,
                                        -7.05123374024808
                                    ],
                                    [
                                        110.4384362532927,
                                        -7.0509874792282545
                                    ],
                                    [
                                        110.4384100054636,
                                        -7.050996410424716
                                    ],
                                    [
                                        110.43839988129946,
                                        -7.05096775616623
                                    ],
                                    [
                                        110.43827276680906,
                                        -7.051013156419515
                                    ],
                                    [
                                        110.43829826470085,
                                        -7.051078651858319
                                    ],
                                    [
                                        110.43838985218468,
                                        -7.051296730946362
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-arsitektur-gedung-b',
                    'type': 'fill-extrusion',
                    'source': 'teknik-arsitekturs-gedung-b', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-arsitektur-gedung-b', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Arsitektur Gedung B</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_arsitektur_gedung_b" class="list-item inside" onclick="floor_arsitektur_gedung_b()">Lantai Teknik Arsitektur Gedung B</button>
            <div style="display: none" id="showhide_arsitektur_gedung_b">
            @foreach ($maps as $item)
            @if ($item->gedung == 'Teknik Arsitektur Gedung B')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_arsitektur_gedung_b').addEventListener('click', () => {
                        map.fitBounds([
                            [110.43841081010825, -
                                7.051137161254643
                            ], // -7.051137161254643, 110.43841081010825
                            [110.4384255622577, -
                                7.051169104334099
                            ], // -7.051169104334099, 110.4384255622577
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-arsitektur-gedung-b', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-arsitektur-gedung-b', () => {
                    map.getCanvas().style.cursor = '';
                });
            });



            //--------------gedung C------------
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('teknik-arsitekturs-gedung-c', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43797674592338,
                                        -7.051322589405231
                                    ],
                                    [
                                        110.43811900894792,
                                        -7.051646037533615
                                    ],
                                    [
                                        110.43845022269898,
                                        -7.0517776142706765
                                    ],
                                    [
                                        110.43849823785592,
                                        -7.051631184899804
                                    ],
                                    [
                                        110.43823865079821,
                                        -7.05152187106259
                                    ],
                                    [
                                        110.43812176115239,
                                        -7.051266505529142
                                    ],
                                    [
                                        110.43797674592338,
                                        -7.051322589405231
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-arsitektur-gedung-c',
                    'type': 'fill-extrusion',
                    'source': 'teknik-arsitekturs-gedung-c', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-arsitektur-gedung-c', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Arsitektur Gedung C</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_arsitektur_gedung_c" class="list-item inside" onclick="floor_arsitektur_gedung_c()">Lantai Teknik Arsitektur Gedung C</button>
            <div style="display: none" id="showhide_arsitektur_gedung_c">
            @foreach ($maps as $item)
            @if ($item->gedung == 'Teknik Arsitektur Gedung C')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_arsitektur_gedung_c').addEventListener('click', () => {
                        map.fitBounds([
                            [110.4381446991714, -
                                7.051520591741523
                            ], // -7.051520591741523, 110.4381446991714
                            [110.43820446885938, -
                                7.051584386136422
                            ], // -7.051584386136422, 110.43820446885938
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-arsitektur-gedung-c', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-arsitektur-gedung-c', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            //--------------gedung D------------
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('teknik-arsitekturs-gedung-d', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43810268351865,
                                        -7.051223950404022
                                    ],
                                    [
                                        110.43804378553665,
                                        -7.051058337255839
                                    ],
                                    [
                                        110.43810545932138,
                                        -7.050939977358269
                                    ],
                                    [
                                        110.4379589672215,
                                        -7.050874926424584
                                    ],
                                    [
                                        110.43787196142256,
                                        -7.051083982931885
                                    ],
                                    [
                                        110.43795139554709,
                                        -7.05128753285031
                                    ],
                                    [
                                        110.43810268351865,
                                        -7.051223950404022
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-arsitektur-gedung-d',
                    'type': 'fill-extrusion',
                    'source': 'teknik-arsitekturs-gedung-d', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-arsitektur-gedung-d', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Arsitektur Gedung D</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_arsitektur_gedung_d" class="list-item inside" onclick="floor_arsitektur_gedung_d()">Lantai Teknik Arsitektur Gedung D</button>
            <div style="display: none" id="showhide_arsitektur_gedung_d">
            @foreach ($maps as $item)
            @if ($item->gedung == 'Teknik Arsitektur Gedung D')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        // <h1>Teknik Arsitektur Gedung D</h1><div class="list-item feedback">Detail APAR & P3K</div>
                        // <button id="fly_arsitektur_gedung_d" class="list-item inside" onclick="floor_arsitektur_gedung_d()">Lantai Teknik Arsitektur Gedung D</button>
                        //   <a href="{{ url('maps/teknik_arsitektur/gedung_d/teknik_arsitektur_lantai1') }}" class="list-item inside" id="lantai1" style="display: none">Lantai 1 <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                        //   <a href="{{ url('maps/teknik_arsitektur/gedung_d/teknik_arsitektur_lantai2') }}" class="list-item inside" id="lantai2" style="display: none">Lantai 2 <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                        //   <a href="{{ url('maps/teknik_arsitektur/gedung_d/teknik_arsitektur_lantai3') }}" class="list-item inside" id="lantai3" style="display: none">Lantai 3 <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                        .addTo(map);
                    document.getElementById('fly_arsitektur_gedung_d').addEventListener('click', () => {
                        map.fitBounds([
                            [110.43800338887097, -
                                7.051025207034239
                            ], // -7.051025207034239, 110.43800338887097
                            [110.43798744036089, -
                                7.05105844561242
                            ], // -7.05105844561242, 110.43798744036089
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-arsitektur-gedung-d', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-arsitektur-gedung-d', () => {
                    map.getCanvas().style.cursor = '';
                });
            });



            //gedung dekanat baru
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('dekanats-baru', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43881376760581,
                                        -7.050735824432482
                                    ],
                                    [
                                        110.43870983200746,
                                        -7.050538841889806
                                    ],
                                    [
                                        110.43846373933272,
                                        -7.050482941423237
                                    ],
                                    [
                                        110.43844697552653,
                                        -7.05054948959693
                                    ],
                                    [
                                        110.43841814177992,
                                        -7.050544165743381
                                    ],
                                    [
                                        110.43840204852597,
                                        -7.050617368724252
                                    ],
                                    [
                                        110.43842417675013,
                                        -7.050624023540131
                                    ],
                                    [
                                        110.4384221650934,
                                        -7.050639329616264
                                    ],
                                    [
                                        110.43881376760581,
                                        -7.050735824432482
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'dekanat-baru',
                    'type': 'fill-extrusion',
                    'source': 'dekanats-baru', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'dekanat-baru', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Dekanat Fakultas Teknik</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_dekanat_baru" class="list-item inside" onclick="floor_dekanat_baru()">Lantai Dekanat Fakultas Teknik</button>
            <div style="display: none" id="showhide_dekanat_fakultas">
            @foreach ($maps as $item)
            @if ($item->gedung == 'Dekanat Fakultas Teknik')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_dekanat_baru').addEventListener('click', () => {
                        map.fitBounds([
                            [110.43858712094622, -
                                7.05059540783121
                            ], // -7.05059540783121, 110.43858712094622
                            [110.43859784978218, -
                                7.0505974042760835
                            ], // -7.0505974042760835, 110.43859784978218
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'dekanat-baru', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'dekanat-baru', () => {
                    map.getCanvas().style.cursor = '';
                });
            });



            //----------------------------teknik kimia-------------------------------------------------
            //--gedung A
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks-kimia-a', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44087397186402,
                                        -7.052115473455001
                                    ],
                                    [
                                        110.44101881114943,
                                        -7.052039608792684
                                    ],
                                    [
                                        110.4410167994927,
                                        -7.052035615915381
                                    ],
                                    [
                                        110.44138962654786,
                                        -7.0518416285818475
                                    ],
                                    [
                                        110.44147344557426,
                                        -7.05199735083657
                                    ],
                                    [
                                        110.44111268846622,
                                        -7.052185016050639
                                    ],
                                    [
                                        110.44110464183969,
                                        -7.052170375504936
                                    ],
                                    [
                                        110.44094639151785,
                                        -7.052250898500563
                                    ],
                                    [
                                        110.44087397186402,
                                        -7.052115473455001
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-kimia-a',
                    'type': 'fill-extrusion',
                    'source': 'tekniks-kimia-a', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-kimia-a', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Kimia Gedung A</h1><div class="list-item feedback">Detail APAR & P3K</div>
                <button id="fly_kimia_a" class="list-item inside" onclick="floor_kimia_a()">Lantai Teknik Kimia Gedung A</button>
                <div style="display: none" id="showhide_kimia_a">
                @foreach ($maps as $item)
                @if ($item->gedung == 'Teknik Kimia Gedung A')
                <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                @endif
                @endforeach
                </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_kimia_a').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44117489871748, -
                                7.052044054671596
                            ], // -7.052044054671596, 110.44117489871748
                            [110.44114910210155, -
                                7.052069656136314
                            ], // -7.052069656136314, 110.44114910210155
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-kimia-a', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-kimia-a', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // --gedung B
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks-kimia-b', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44107069760179,
                                        -7.052561195106421
                                    ],
                                    [
                                        110.44110276232277,
                                        -7.052449463826861
                                    ],
                                    [
                                        110.44104611247815,
                                        -7.052341719913102
                                    ],
                                    [
                                        110.44116480023217,
                                        -7.052282991374668
                                    ],
                                    [
                                        110.44123856099009,
                                        -7.052436217936062
                                    ],
                                    [
                                        110.441196986754,
                                        -7.052605249570334
                                    ],
                                    [
                                        110.44107069760179,
                                        -7.052561195106421
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-kimia-b',
                    'type': 'fill-extrusion',
                    'source': 'tekniks-kimia-b', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-kimia-b', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Kimia Gedung B</h1><div class="list-item feedback">Detail APAR & P3K</div>
                <button id="fly_kimia_b" class="list-item inside" onclick="floor_kimia_b()">Lantai Teknik Kimia Gedung B</button>
                <div style="display: none" id="showhide_kimia_b">
                @foreach ($maps as $item)
                @if ($item->gedung == 'Teknik Kimia Gedung B')
                <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                @endif
                @endforeach
                </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_kimia_b').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44116759587276, -
                                7.052431694959633
                            ], // -7.052431694959633, 110.44116759587276
                            [110.44116156090254, -
                                7.052462972470875
                            ], // -7.052462972470875, 110.44116156090254
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-kimia-b', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-kimia-b', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // --gedung C
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks-kimia-c', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44079337986797,
                                        -7.053141887012182
                                    ],
                                    [
                                        110.44090402099322,
                                        -7.053079997557344
                                    ],
                                    [
                                        110.44094157192056,
                                        -7.052962873405113
                                    ],
                                    [
                                        110.4410783645845,
                                        -7.053004133053024
                                    ],
                                    [
                                        110.44104416641852,
                                        -7.0531358977104635
                                    ],
                                    [
                                        110.44103008482075,
                                        -7.053133235798566
                                    ],
                                    [
                                        110.44101734432755,
                                        -7.05316384778449
                                    ],
                                    [
                                        110.44098851057976,
                                        -7.053186474033658
                                    ],
                                    [
                                        110.44099186334113,
                                        -7.053200449069348
                                    ],
                                    [
                                        110.44085909399085,
                                        -7.05326899328597
                                    ],
                                    [
                                        110.44079337986797,
                                        -7.053141887012182
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-kimia-c',
                    'type': 'fill-extrusion',
                    'source': 'tekniks-kimia-c', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-kimia-c', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Kimia Gedung C</h1><div class="list-item feedback">Detail APAR & P3K</div>
                <button id="fly_kimia_c" class="list-item inside" onclick="floor_kimia_c()">Lantai Teknik Kimia Gedung C</button>
                <div style="display: none" id="showhide_kimia_c">
                @foreach ($maps as $item)
                @if ($item->gedung == 'Teknik Kimia Gedung C')
                <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                @endif
                @endforeach
                </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_kimia_c').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44095459933877, -
                                7.053123199727869
                            ], // -7.053123199727869, 110.44095459933877
                            [110.4409720336972, -
                                7.053113883035895
                            ], // -7.053113883035895, 110.4409720336972
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-kimia-c', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-kimia-c', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // --lab pengolahan limbah
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks-kimia-pengolahan-limbah', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44112536951057,
                                        -7.05192327146523
                                    ],
                                    [
                                        110.44132117076678,
                                        -7.0518261114165615
                                    ],
                                    [
                                        110.44126886769149,
                                        -7.051724292987512
                                    ],
                                    [
                                        110.44107373698753,
                                        -7.051823449497121
                                    ],
                                    [
                                        110.44112536951057,
                                        -7.05192327146523
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-kimia-pengolahan-limbah',
                    'type': 'fill-extrusion',
                    'source': 'tekniks-kimia-pengolahan-limbah', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-kimia-pengolahan-limbah', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Laboratorium Pengolah Limbah</h1><div class="list-item feedback">Detail APAR & P3K</div>
                <button id="fly_lab_pengolahlimbah" class="list-item inside" onclick="floor_lab_pengolahlimbah()">Lantai Laboratorium Pengolah Limbah</button>
                <div style="display: none" id="showhide_lab_pengolahlimbah">
                @foreach ($maps as $item)
                @if ($item->gedung == 'Laboratorium Pengolahan Limbah (Teknik Kimia)')
                <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                @endif
                @endforeach
                </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_lab_pengolahlimbah').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44119894162314, -
                                7.051819313728907
                            ], // -7.051819313728907, 110.44119894162314
                            [110.44118955389169, -
                                7.0518233066080676
                            ], // -7.0518233066080676, 110.44118955389169
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-kimia-pengolahan-limbah', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-kimia-pengolahan-limbah', () => {
                    map.getCanvas().style.cursor = '';
                });
            });



            // --lab kimia dasar
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks-kimia-lab-kimia-dasar', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44105831428544,
                                        -7.051808143459153
                                    ],
                                    [
                                        110.44127289100456,
                                        -7.051701666665955
                                    ],
                                    [
                                        110.44123265786975,
                                        -7.051620478094683
                                    ],
                                    [
                                        110.44101808115062,
                                        -7.051728285866545
                                    ],
                                    [
                                        110.44101741059836,
                                        -7.051727620386557
                                    ],
                                    [
                                        110.44105831428544,
                                        -7.051808143459153
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik-kimia-lab-kimia-dasar',
                    'type': 'fill-extrusion',
                    'source': 'tekniks-kimia-lab-kimia-dasar', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik-kimia-lab-kimia-dasar', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Laboratorium Kimia Dasar</h1><div class="list-item feedback">Detail APAR & P3K</div>
                <button id="fly_lab_kimiadasar" class="list-item inside" onclick="floor_lab_kimiadasar()">Lantai Laboratorium Kimia Dasar</button>
                <div style="display: none" id="showhide_lab_kimiadasar">
                @foreach ($maps as $item)
                @if ($item->gedung == 'Laboratorium Kimia Dasar (Teknik Kimia)')
                <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                @endif
                @endforeach
                </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_lab_kimiadasar').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44114990151887, -
                                7.051724335370081
                            ], // -7.051724335370081, 110.44114990151887
                            [110.441146518329, -
                                7.0517153817740335
                            ], // -7.0517153817740335, 110.441146518329
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik-kimia-lab-kimia-dasar', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik-kimia-lab-kimia-dasar', () => {
                    map.getCanvas().style.cursor = '';
                });
            });




            // ---------------------------gedung GKB---------------------------------------------
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('gedungs-gkb', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44019252308038,
                                        -7.050845283175903
                                    ],
                                    [
                                        110.44044513066325,
                                        -7.050700650116923
                                    ],
                                    [
                                        110.44042188243947,
                                        -7.050660015102977
                                    ],
                                    [
                                        110.44043576197635,
                                        -7.0506524390836205
                                    ],
                                    [
                                        110.4403923884214,
                                        -7.050577367610771
                                    ],
                                    [
                                        110.44035456668058,
                                        -7.050598029485599
                                    ],
                                    [
                                        110.44029753203137,
                                        -7.050502429154292
                                    ],
                                    [
                                        110.44033531419774,
                                        -7.0504812560891
                                    ],
                                    [
                                        110.4402867864053,
                                        -7.050398318441452
                                    ],
                                    [
                                        110.44027120250496,
                                        -7.050406051472038
                                    ],
                                    [
                                        110.44025103510654,
                                        -7.0503732998100475
                                    ],
                                    [
                                        110.43999670661623,
                                        -7.05051676211167
                                    ],
                                    [
                                        110.44006881246992,
                                        -7.050641993156731
                                    ],
                                    [
                                        110.44018320261068,
                                        -7.050576175081204
                                    ],
                                    [
                                        110.44023060553286,
                                        -7.05065966243707
                                    ],
                                    [
                                        110.4401213340185,
                                        -7.050721725780036
                                    ],
                                    [
                                        110.44019232131052,
                                        -7.050845797941619
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'gedung-gkb',
                    'type': 'fill-extrusion',
                    'source': 'gedungs-gkb', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'gedung-gkb', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Gedung Kuliah Bersama</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_gkb" class="list-item inside" onclick="floor_gkb()">Lantai Gedung Kuliah Bersama</button>
                    <div style="display: none" id="showhide_gkb">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Gedung Kuliah Bersama')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_gkb').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44027707962385, -
                                7.050573118819528
                            ], //  110.44038320745972, -7.051447597955487
                            [110.44028065360942, -
                                7.050564251420809
                            ], // 110.44038767984387, -7.051460913627565
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'gedung-gkb', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'gedung-gkb', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            //belum di update


            // ---------------------------Gedung Elektro---------------------------------------------
            //--gedung A
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_elektro_a', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44012423889313,
                                        -7.0499595154411026
                                    ],
                                    [
                                        110.44018199157273,
                                        -7.049760995324945
                                    ],
                                    [
                                        110.44013203543005,
                                        -7.049746521072279
                                    ],
                                    [
                                        110.44013739984877,
                                        -7.0497305494839395
                                    ],
                                    [
                                        110.44011862438401,
                                        -7.049725391991629
                                    ],
                                    [
                                        110.44013113798479,
                                        -7.049682677315801
                                    ],
                                    [
                                        110.44007095591837,
                                        -7.049666372983182
                                    ],
                                    [
                                        110.44005922125507,
                                        -7.049707300184224
                                    ],
                                    [
                                        110.44004027815419,
                                        -7.049702142691686
                                    ],
                                    [
                                        110.44003675775332,
                                        -7.049715618722161
                                    ],
                                    [
                                        110.43998261065735,
                                        -7.049700811727703
                                    ],
                                    [
                                        110.43996148826255,
                                        -7.049772517505403
                                    ],
                                    [
                                        110.43994723902864,
                                        -7.049768690978965
                                    ],
                                    [
                                        110.43993148105005,
                                        -7.0498227614529725
                                    ],
                                    [
                                        110.43994539500983,
                                        -7.049826255237889
                                    ],
                                    [
                                        110.43992376970272,
                                        -7.049902453005387
                                    ],
                                    [
                                        110.44012423889313,
                                        -7.0499595154411026
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_elektro_a',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_elektro_a', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik_elektro_a', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Elektro Gedung A</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_teknik_elektro_a" class="list-item inside" onclick="floor_elektro_gedung_a()">Lantai Teknik Elektro Gedung A</button>
            <div style="display: none" id="showhide_elektro_gedung_a">
            @foreach ($maps as $item)
            @if ($item->gedung == 'Teknik Elektro Gedung A')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_teknik_elektro_a').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44004933265097, -7.0498219866558145],
                            [110.44004933265097, -7.0498219866558145],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_elektro_a', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_elektro_a', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            //--gedung B
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_elektro_b', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43944747110419,
                                        -7.049918008390819
                                    ],
                                    [
                                        110.439330524446,
                                        -7.050309454063125
                                    ],
                                    [
                                        110.43968195955705,
                                        -7.050408791243029
                                    ],
                                    [
                                        110.43971513989891,
                                        -7.050286403435663
                                    ],
                                    [
                                        110.43949255511012,
                                        -7.05022520952258
                                    ],
                                    [
                                        110.43957301743848,
                                        -7.049955187838876
                                    ],
                                    [
                                        110.43944747110419,
                                        -7.049918008390819
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_elektro_b',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_elektro_b', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });


                map.on('click', 'teknik_elektro_b', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Elektro Gedung B</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_elektro_b" class="list-item inside" onclick="floor_elektro_gedung_b()">Lantai Teknik Elektro Gedung B</button>
            <div style="display: none" id="showhide_elektro_gedung_b">
            @foreach ($maps as $item)
            @if ($item->gedung == 'Teknik Elektro Gedung B')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_elektro_b').addEventListener('click', () => {
                        map.fitBounds([
                            [110.4394286925247, -7.050242198492015],
                            [110.4394286925247, -7.050242198492015],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_elektro_b', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_elektro_b', () => {
                    map.getCanvas().style.cursor = '';
                });
            });



            // ---------------------------Gedung PWK---------------------------------------------
            //--gedung A (yang bawah)
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_pwk_a', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43908157622849,
                                        -7.051617432205489
                                    ],
                                    [
                                        110.43913323800899,
                                        -7.051378425699909
                                    ],
                                    [
                                        110.43927036027412,
                                        -7.051302761249005
                                    ],
                                    [
                                        110.439190767919,
                                        -7.051173327891121
                                    ],
                                    [
                                        110.43899360230324,
                                        -7.051278925556375
                                    ],
                                    [
                                        110.43891903683533,
                                        -7.051571882735146
                                    ],
                                    [
                                        110.43908157622849,
                                        -7.051617432205489
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_pwk_a',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_pwk_a', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_pwk_a', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>PWK Gedung A</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_teknik_pwk_a" class="list-item inside" onclick="floor_pwk_a()">Lantai PWK Gedung A</button>
            <div style="display: none" id="showhide_pwk_a">
            @foreach ($maps as $item)
            @if ($item->gedung == 'PWK Gedung A')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_teknik_pwk_a').addEventListener('click', () => {
                        map.fitBounds([
                            [110.43908010875005, -7.051365712079983],
                            [110.43908010875005, -7.051365712079983],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_pwk_a', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_pwk_a', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            //--gedung B (yang atas)
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_pwk_b', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43899339254443,
                                        -7.0512223564623895
                                    ],
                                    [
                                        110.43913169395648,
                                        -7.051139004991967
                                    ],
                                    [
                                        110.43896006293505,
                                        -7.050860197320134
                                    ],
                                    [
                                        110.43873324863893,
                                        -7.050806792446338
                                    ],
                                    [
                                        110.43869821227986,
                                        -7.050951867350392
                                    ],
                                    [
                                        110.43884841599316,
                                        -7.05098697147649
                                    ],
                                    [
                                        110.43899339254443,
                                        -7.0512223564623895
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_pwk_b',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_pwk_b', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_pwk_b', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>PWK Gedung B</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_teknik_pwk_b" class="list-item inside" onclick="floor_pwk_b()">Lantai PWK Gedung B</button>
            <div style="display: none" id="showhide_pwk_b">
            @foreach ($maps as $item)
            @if ($item->gedung == 'PWK Gedung B')
            <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
            @endif
            @endforeach
            </div>
            `)
                        .addTo(map);
                    document.getElementById('fly_teknik_pwk_b').addEventListener('click', () => {
                        map.fitBounds([
                            [110.43894070804863, -7.050990200424679],
                            [110.43894070804863, -7.050990200424679],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_pwk_b', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_pwk_b', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // ---------------------------Gedung Dekanat Lama---------------------------------------------
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('gedungs_dekanat_lama', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44034618093855,
                                        -7.05179370549034
                                    ],
                                    [
                                        110.44039699665018,
                                        -7.051615776027376
                                    ],
                                    [
                                        110.44043437993832,
                                        -7.051626590080417
                                    ],
                                    [
                                        110.44039599082038,
                                        -7.051555716434947
                                    ],
                                    [
                                        110.44035709878932,
                                        -7.05157568084185
                                    ],
                                    [
                                        110.44035290783773,
                                        -7.051567695079726
                                    ],
                                    [
                                        110.4403339647368,
                                        -7.05157784365251
                                    ],
                                    [
                                        110.4403088190258,
                                        -7.0515330901056785
                                    ],
                                    [
                                        110.44025819233491,
                                        -7.051559376575867
                                    ],
                                    [
                                        110.44022147960027,
                                        -7.051492662175718
                                    ],
                                    [
                                        110.44027646488735,
                                        -7.051463547403927
                                    ],
                                    [
                                        110.44025349847368,
                                        -7.0514192929568225
                                    ],
                                    [
                                        110.44027512378483,
                                        -7.0514076470490465
                                    ],
                                    [
                                        110.44026942409027,
                                        -7.0513966666209456
                                    ],
                                    [
                                        110.44030311934529,
                                        -7.051379364124301
                                    ],
                                    [
                                        110.44027143575323,
                                        -7.051313647917539
                                    ],
                                    [
                                        110.44025970108817,
                                        -7.051354075862207
                                    ],
                                    [
                                        110.44008217237882,
                                        -7.051302334747092
                                    ],
                                    [
                                        110.44013598420719,
                                        -7.051122322197429
                                    ],
                                    [
                                        110.44031301000643,
                                        -7.051174562440963
                                    ],
                                    [
                                        110.44028887012638,
                                        -7.051258080274096
                                    ],
                                    [
                                        110.44033849100174,
                                        -7.051360397917591
                                    ],
                                    [
                                        110.44042029837578,
                                        -7.051317807161624
                                    ],
                                    [
                                        110.44042532751871,
                                        -7.051326957519848
                                    ],
                                    [
                                        110.44043773273546,
                                        -7.051321467304419
                                    ],
                                    [
                                        110.44051970776059,
                                        -7.051475359662803
                                    ],
                                    [
                                        110.44050931420071,
                                        -7.051480184395743
                                    ],
                                    [
                                        110.44051501389356,
                                        -7.0514923294123975
                                    ],
                                    [
                                        110.44042968612013,
                                        -7.051536417483405
                                    ],
                                    [
                                        110.44048718597884,
                                        -7.051641729724182
                                    ],
                                    [
                                        110.44057469304744,
                                        -7.051666685229122
                                    ],
                                    [
                                        110.4405233958081,
                                        -7.051844202009562
                                    ],
                                    [
                                        110.44034618093855,
                                        -7.05179370549034
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'gedung_dekanat_lama',
                    'type': 'fill-extrusion',
                    'source': 'gedungs_dekanat_lama', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'gedung_dekanat_lama', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Dekanat Fakultas Teknik Lama</h1><div class="list-item feedback">Detail APAR & P3K</div>
            <button id="fly_dekanat_baru" class="list-item inside" onclick="floor_dekanat_baru()">Lantai Dekanat Fakultas Teknik Lama</button>
            `)
                        // <a href="{{ url('maps/dekanat_fakultas_teknik/dekanat_fakultas_teknik_lantai1') }}" class="list-item inside" id="lantai1" style="display: none">Lantai 1 <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                        // <a href="{{ url('maps/dekanat_fakultas_teknik/dekanat_fakultas_teknik_lantai2') }}" class="list-item inside" id="lantai2" style="display: none">Lantai 2 <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                        // <a href="{{ url('maps/dekanat_fakultas_teknik/dekanat_fakultas_teknik_lantai3') }}" class="list-item inside" id="lantai3" style="display: none">Lantai 3 <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                        // <a href="{{ url('maps/dekanat_fakultas_teknik/dekanat_fakultas_teknik_lantai4') }}" class="list-item inside" id="lantai4" style="display: none">Lantai 4 <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                        // <a href="{{ url('maps/dekanat_fakultas_teknik/dekanat_fakultas_teknik_lantai5') }}" class="list-item inside" id="lantai5" style="display: none">Lantai 5 <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                        .addTo(map);
                    document.getElementById('fly_dekanat_baru').addEventListener('click', () => {
                        map.fitBounds([
                            [110.440383, -7.051447],
                            [110.440383, -7.051447],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'gedung_dekanat_lama', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'gedung_dekanat_lama', () => {
                    map.getCanvas().style.cursor = '';
                });
            });



            // ---------------------------Gedung Geologi---------------------------------------------
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_geologi', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43940614247649,
                                        -7.052642234814393
                                    ],
                                    [
                                        110.43940898159212,
                                        -7.052613752134793
                                    ],
                                    [
                                        110.43945390859028,
                                        -7.052619075964552
                                    ],
                                    [
                                        110.43946195521681,
                                        -7.052565837664222
                                    ],
                                    [
                                        110.43949280061852,
                                        -7.0525684995793885
                                    ],
                                    [
                                        110.43952968099015,
                                        -7.052296984153706
                                    ],
                                    [
                                        110.4395390687211,
                                        -7.052299646070412
                                    ],
                                    [
                                        110.43954711534762,
                                        -7.052229770751783
                                    ],
                                    [
                                        110.43951895215476,
                                        -7.052227108834685
                                    ],
                                    [
                                        110.43952230491583,
                                        -7.052203151580009
                                    ],
                                    [
                                        110.43943982699385,
                                        -7.052192503910874
                                    ],
                                    [
                                        110.43943848588943,
                                        -7.052207809935177
                                    ],
                                    [
                                        110.43933790305776,
                                        -7.052194500348851
                                    ],
                                    [
                                        110.43932918587902,
                                        -7.052259051838966
                                    ],
                                    [
                                        110.43933387974448,
                                        -7.052260382797439
                                    ],
                                    [
                                        110.43932583311796,
                                        -7.0523076318204385
                                    ],
                                    [
                                        110.43931979814806,
                                        -7.0523076318204385
                                    ],
                                    [
                                        110.4393171159392,
                                        -7.052334916465342
                                    ],
                                    [
                                        110.43932985643121,
                                        -7.0523389093400635
                                    ],
                                    [
                                        110.43930303434277,
                                        -7.052536556596061
                                    ],
                                    [
                                        110.43931309262594,
                                        -7.052540549469051
                                    ],
                                    [
                                        110.43930557002878,
                                        -7.0526077455318361
                                    ],
                                    [
                                        110.43933641543049,
                                        -7.052613734840387
                                    ],
                                    [
                                        110.43933440377387,
                                        -7.052633699201664
                                    ],
                                    [
                                        110.43940614247649,
                                        -7.052642234814393
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_geologi',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_geologi', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_geologi', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Geologi</h1><div class="list-item feedback">Detail APAR & P3K</div>
                <button id="fly_teknik_geologi" class="list-item inside" onclick="floor_geologi()">Lantai Teknik Geologi</button>
                <div style="display: none" id="showhide_geologi">
                @foreach ($maps as $item)
                @if ($item->gedung == 'Teknik Geologi')
                <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                @endif
                @endforeach
                </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_geologi').addEventListener('click', () => {
                        map.fitBounds([
                            [110.43941696833167, -7.052399838697005],
                            [110.43941696833167, -7.052399838697005],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_geologi', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_geologi', () => {
                    map.getCanvas().style.cursor = '';
                });
            });




            // ---------------------------Gedung Sipil---------------------------------------------
            // gedung A
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_sipil_gedung_A', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43900653467438,
                                        -7.053296306100449
                                    ],
                                    [
                                        110.43907239730703,
                                        -7.053058905234792
                                    ],
                                    [
                                        110.43883736800376,
                                        -7.052994676165042
                                    ],
                                    [
                                        110.43877143858276,
                                        -7.053232564930397
                                    ],
                                    [
                                        110.43900653467438,
                                        -7.053296306100449
                                    ],

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_sipil_gedung_A',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_sipil_gedung_A', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_sipil_gedung_A', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Sipil Gedung A</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_teknik_sipil_gedung_A" class="list-item inside" onclick="floor_sipil_a()">Lantai Teknik Sipil Gedung A</button>
                    <div style="display: none" id="showhide_sipil_a">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Teknik Sipil Gedung A')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_sipil_gedung_A').addEventListener('click', () => {
                        map.fitBounds([
                            [110.4389737422591, -7.053156466583636],
                            [110.4389737422591, -7.053156466583636],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_sipil_gedung_A', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_sipil_gedung_A', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // gedung B & C
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_sipil_gedung_B_C', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43912196032795,
                                        -7.053032815442592
                                    ],
                                    [
                                        110.43916239216605,
                                        -7.052877493603461
                                    ],
                                    [
                                        110.43895900805438,
                                        -7.052823827487757
                                    ],
                                    [
                                        110.4389830979838,
                                        -7.052735881483898
                                    ],
                                    [
                                        110.43921338623176,
                                        -7.052799065987358
                                    ],
                                    [
                                        110.43925510276898,
                                        -7.052644814299597
                                    ],
                                    [
                                        110.43878505810522,
                                        -7.05251891316847
                                    ],
                                    [
                                        110.43874213241929,
                                        -7.052671416766913
                                    ],
                                    [
                                        110.43893636568845,
                                        -7.052725157240218
                                    ],
                                    [
                                        110.43891390546065,
                                        -7.052813816463086
                                    ],
                                    [
                                        110.43864019700072,
                                        -7.052742064865583
                                    ],
                                    [
                                        110.43859991009123,
                                        -7.052895676601224
                                    ],
                                    [
                                        110.43885941382928,
                                        -7.05296388812485
                                    ],
                                    [
                                        110.43886343714291,
                                        -7.0529464193208895
                                    ],
                                    [
                                        110.43888523009025,
                                        -7.0529527413641375
                                    ],
                                    [
                                        110.43888070386367,
                                        -7.052969544689375
                                    ],
                                    [
                                        110.43912196032795,
                                        -7.053032815442592
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_sipil_gedung_B_C',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_sipil_gedung_B_C', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_sipil_gedung_B_C', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Sipil Gedung B & C</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_teknik_sipil_gedung_B_C" class="list-item inside" onclick="floor_sipil_b_dan_c()">Lantai Teknik Sipil Gedung B & C</button>
                    <div style="display: none" id="showhide_sipil_b_dan_c">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Teknik Sipil Gedung B dan C')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_sipil_gedung_B_C').addEventListener('click', () => {
                        map.fitBounds([
                            [110.4389486382442, -7.052902339286147],
                            [110.4389486382442, -7.052902339286147],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_sipil_gedung_B_C', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_sipil_gedung_B_C', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // gedung D
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_sipil_gedung_D', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43865593237854,
                                        -7.052705821198178
                                    ],
                                    [
                                        110.43854730292121,
                                        -7.0526775383570905
                                    ],
                                    [
                                        110.43856607838474,
                                        -7.052609659531185
                                    ],
                                    [
                                        110.43853188021876,
                                        -7.052601673786361
                                    ],
                                    [
                                        110.43855065568226,
                                        -7.052522481807934
                                    ],
                                    [
                                        110.43856339617547,
                                        -7.052525809202197
                                    ],
                                    [
                                        110.43859021826562,
                                        -7.05241667065613
                                    ],
                                    [
                                        110.43848225934948,
                                        -7.052387389578908
                                    ],
                                    [
                                        110.4385151164099,
                                        -7.052262944978679
                                    ],
                                    [
                                        110.4386398391329,
                                        -7.052294887980493
                                    ],
                                    [
                                        110.43865056796929,
                                        -7.052252962790166
                                    ],
                                    [
                                        110.43883698150151,
                                        -7.052301542772275
                                    ],
                                    [
                                        110.43880079151451,
                                        -7.0524440110875295
                                    ],
                                    [
                                        110.43875586451195,
                                        -7.052433363424843
                                    ],
                                    [
                                        110.4387203252413,
                                        -7.0525631318095785
                                    ],
                                    [
                                        110.43869551480715,
                                        -7.052556477021563
                                    ],
                                    [
                                        110.43865593237854,
                                        -7.052705821198178
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_sipil_gedung_D',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_sipil_gedung_D', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_sipil_gedung_D', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Sipil Gedung D</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_teknik_sipil_gedung_D" class="list-item inside" onclick="floor_sipil_d()">Lantai Teknik Sipil Gedung D</button>
                    <div style="display: none" id="showhide_sipil_d">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Teknik Sipil Gedung D')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_sipil_gedung_D').addEventListener('click', () => {
                        map.fitBounds([
                            [110.43865877325648, -7.052453990326003],
                            [110.43865877325648, -7.052453990326003],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_sipil_gedung_D', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_sipil_gedung_D', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // gedung E
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_sipil_gedung_E', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.43894012576555,
                                        -7.052320660363108
                                    ],
                                    [
                                        110.43914159294411,
                                        -7.052379772715511
                                    ],
                                    [
                                        110.43920679427328,
                                        -7.052155838540571
                                    ],
                                    [
                                        110.43908338805022,
                                        -7.052120054354631
                                    ],
                                    [
                                        110.43907602430397,
                                        -7.0521429864744505
                                    ],
                                    [
                                        110.43899400741071,
                                        -7.052119046348906
                                    ],
                                    [
                                        110.43897724854043,
                                        -7.052181038669602
                                    ],
                                    [
                                        110.43893585921057,
                                        -7.052168438605278
                                    ],
                                    [
                                        110.43891097482515,
                                        -7.052252103025012
                                    ],
                                    [
                                        110.43895718867924,
                                        -7.052264703087033
                                    ],
                                    [
                                        110.4389404298089,
                                        -7.052321655364381
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_sipil_gedung_E',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_sipil_gedung_E', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_sipil_gedung_E', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Sipil Gedung E</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_teknik_sipil_gedung_E" class="list-item inside" onclick="floor_sipil_e()">Lantai Teknik Sipil Gedung E</button>
                    <div style="display: none" id="showhide_sipil_e">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Teknik Sipil Gedung E')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_sipil_gedung_E').addEventListener('click', () => {
                        map.fitBounds([
                            [110.43907038987942, -7.052238426206088],
                            [110.43907038987942, -7.052238426206088],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_sipil_gedung_E', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_sipil_gedung_E', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // Teknik Mesin
            // gedung A
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_mesin_gedung_A', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44184399885233,
                                        -7.050374714234067
                                    ],
                                    [
                                        110.44190505467094,
                                        -7.0501757991122105
                                    ],
                                    [
                                        110.44171400736883,
                                        -7.050118639260077
                                    ],
                                    [
                                        110.44170210506763,
                                        -7.050160731015069
                                    ],
                                    [
                                        110.44168450307006,
                                        -7.050154408933665
                                    ],
                                    [
                                        110.44164962570011,
                                        -7.050269482007835
                                    ],
                                    [
                                        110.44166974226653,
                                        -7.050275970458088
                                    ],
                                    [
                                        110.44165767232647,
                                        -7.050318894051429
                                    ],
                                    [
                                        110.44184408585397,
                                        -7.050375127278315
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_mesin_gedung_A',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_mesin_gedung_A', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_mesin_gedung_A', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Mesin Gedung A</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_teknik_mesin_gedung_A" class="list-item inside" onclick="floor_mesin_a()">Lantai Teknik Mesin Gedung A</button>
                    <div style="display: none" id="showhide_mesin_a">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Teknik Mesin Gedung A')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_mesin_gedung_A').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44177127094258, -7.050239844922089],
                            [110.44177127094258, -7.050239844922089],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_mesin_gedung_A', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_mesin_gedung_A', () => {
                    map.getCanvas().style.cursor = '';
                });
            });

            // gedung B
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_mesin_gedung_B', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44167138258098,
                                        -7.050821473791444
                                    ],
                                    [
                                        110.44179945076047,
                                        -7.050756832024959
                                    ],
                                    [
                                        110.44169776393403,
                                        -7.050561692909767
                                    ],
                                    [
                                        110.44173976902476,
                                        -7.050407540374238
                                    ],
                                    [
                                        110.44160296044936,
                                        -7.050369372498096
                                    ],
                                    [
                                        110.44154495463096,
                                        -7.050553128348284
                                    ],
                                    [
                                        110.44156498846138,
                                        -7.050556810263046
                                    ],
                                    [
                                        110.44156795643784,
                                        -7.0505958385603975
                                    ],
                                    [
                                        110.44154866459616,
                                        -7.050603202390036
                                    ],
                                    [
                                        110.44167134383673,
                                        -7.050821787971273
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_mesin_gedung_B',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_mesin_gedung_B', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_mesin_gedung_B', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Teknik Mesin Gedung B</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_teknik_mesin_gedung_B" class="list-item inside" onclick="floor_mesin_b()">Lantai Teknik Mesin Gedung B</button>
                    <div style="display: none" id="showhide_mesin_b">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Teknik Mesin Gedung B')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_mesin_gedung_B').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44163009984413, -7.050571560893417],
                            [110.44163009984413, -7.050571560893417],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_mesin_gedung_B', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_mesin_gedung_B', () => {
                    map.getCanvas().style.cursor = '';
                });
            });

            // laboratorium tribologi
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_mesin_lab_tribologi', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.44094161030648,
                                        -7.050042030557975
                                    ],
                                    [
                                        110.44103601939219,
                                        -7.050067818252472
                                    ],
                                    [
                                        110.44106674218216,
                                        -7.049951535080751
                                    ],
                                    [
                                        110.44108685875028,
                                        -7.04995752442386
                                    ],
                                    [
                                        110.44109909632908,
                                        -7.049911273384183
                                    ],
                                    [
                                        110.44107344770424,
                                        -7.049905117669908
                                    ],
                                    [
                                        110.44108032086604,
                                        -7.049878997475531
                                    ],
                                    [
                                        110.44102315628572,
                                        -7.049864689598792
                                    ],
                                    [
                                        110.44101829478245,
                                        -7.049885818673104
                                    ],
                                    [
                                        110.44098594063558,
                                        -7.049877666510454
                                    ],
                                    [
                                        110.44094161030648,
                                        -7.050042030557975
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_mesin_lab_tribologi',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_mesin_lab_tribologi', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_mesin_lab_tribologi', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Laboratorium Tribologi (Teknik Mesin)</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_teknik_mesin_lab_tribologi" class="list-item inside" onclick="floor_mesin_b()">Lantai Laboratorium Tribologi</button>
                    <div style="display: none" id="showhide_mesin_b">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Laboratorium Tribologi (Teknik Mesin)')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_mesin_lab_tribologi').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44101456559252, -7.049959859169121],
                            [110.44101456559252, -7.049959859169121],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_mesin_lab_tribologi', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_mesin_lab_tribologi', () => {
                    map.getCanvas().style.cursor = '';
                });
            });


            // Teknik Mesin Laboratorium
            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('tekniks_mesin_laboratorium', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Polygon',
                            // These coordinates outline Maine. -7.051224923256234, 110.44164550106495
                            'coordinates': [
                                [
                                    [
                                        110.4411301472656,
                                        -7.050200501687357
                                    ],
                                    [
                                        110.44117278457026,
                                        -7.050070088462618
                                    ],
                                    [
                                        110.44155022955874,
                                        -7.050189055847014
                                    ],
                                    [
                                        110.44150829122566,
                                        -7.050320509568905
                                    ],
                                    [
                                        110.4411301472656,
                                        -7.050200501687357
                                    ]

                                ]
                            ]
                        }
                    }
                });
                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'teknik_mesin_laboratorium',
                    'type': 'fill-extrusion',
                    'source': 'tekniks_mesin_laboratorium', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            0,
                            18,
                            15
                        ],
                        'fill-extrusion-color': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            17,
                            'hsl(40, 41%, 82%)',
                            18,
                            'hsl(236, 91%, 44%)'
                        ]
                    }
                });

                map.on('click', 'teknik_mesin_laboratorium', (e) => {
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(`<h1>Gedung Teknik Mesin</h1><div class="list-item feedback">Detail APAR & P3K</div>
                    <button id="fly_teknik_mesin_laboratorium" class="list-item inside" onclick="floor_mesin_b()">Lantai Gedung Teknik Mesin</button>
                    <div style="display: none" id="showhide_mesin_b">
                    @foreach ($maps as $item)
                    @if ($item->gedung == 'Gedung Laboratorium Teknik Mesin')
                    <a href="{{ url('detail_maps/' . $item->id) }}" class="list-item inside">{{ $item->lantai }} <img id="mapsimg" src="{{ asset('foto_maps/foreign.png') }}"></a>
                    @endif
                    @endforeach
                    </div>
                `)
                        .addTo(map);
                    document.getElementById('fly_teknik_mesin_laboratorium').addEventListener('click', () => {
                        map.fitBounds([
                            [110.44133599457797, -7.05018662794177],
                            [110.44133599457797, -7.05018662794177],
                        ]);
                    });
                });


                // Change the cursor to a pointer when
                // the mouse is over the states layer.
                map.on('mouseenter', 'teknik_mesin_laboratorium', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change the cursor back to a pointer
                // when it leaves the states layer.
                map.on('mouseleave', 'teknik_mesin_laboratorium', () => {
                    map.getCanvas().style.cursor = '';
                });
            });






            // awalan
        </script>
    @stop
