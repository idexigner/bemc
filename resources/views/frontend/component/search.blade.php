<div class="banner d-md-flex d-none" id="uhjl">
    <div class="search-wrapper">
        <ul class="search-tabs group">
            <li class="brand active"><a href="javascript:;" class="search_option_type search_by_brand">Brand</a></li>
            <li class="generic"><a href="javascript:;" class="search_option_type search_by_generic">Generic</a></li>
            <li class="indication"><a href="javascript:;" class="search_option_type search_by_indication">Indication</a></li>
            <li class="manufacture"><a href="javascript:;" class="search_option_type search_by_manufacturer">Manufacturer</a></li>
        </ul>
        <div class="search">
            <input class="search-bar no-outline" type="text" id="searchDrugOption">
            <button class="search-btn no-outline"  id="searchInformation"><img src="../frontend/images/icons/magnifying-glass.svg" class="search-icon" alt=""></button>
            <div id="searchDrugOptionautocomplete-list" class="autocomplete-items"></div>
        </div>
        <div class="alphabets">
            <a href="javascript:;" class="alphabet-link">A</a>
            <a href="javascript:;" class="alphabet-link">B</a>
            <a href="javascript:;" class="alphabet-link">C</a>
            <a href="javascript:;" class="alphabet-link">D</a>
            <a href="javascript:;" class="alphabet-link">E</a>
            <a href="javascript:;" class="alphabet-link">F</a>
            <a href="javascript:;" class="alphabet-link">G</a>
            <a href="javascript:;" class="alphabet-link">H</a>
            <a href="javascript:;" class="alphabet-link">I</a>
            <a href="javascript:;" class="alphabet-link">J</a>
            <a href="javascript:;" class="alphabet-link">K</a>
            <a href="javascript:;" class="alphabet-link">L</a>
            <a href="javascript:;" class="alphabet-link">M</a>
            <a href="javascript:;" class="alphabet-link">N</a>
            <a href="javascript:;" class="alphabet-link">O</a>
            <a href="javascript:;" class="alphabet-link">P</a>
            <a href="javascript:;" class="alphabet-link">Q</a>
            <a href="javascript:;" class="alphabet-link">R</a>
            <a href="javascript:;" class="alphabet-link">S</a>
            <a href="javascript:;" class="alphabet-link">T</a>
            <a href="javascript:;" class="alphabet-link">U</a>
            <a href="javascript:;" class="alphabet-link">V</a>
            <a href="javascript:;" class="alphabet-link">W</a>
            <a href="javascript:;" class="alphabet-link">X</a>
            <a href="javascript:;" class="alphabet-link">Y</a>
            <a href="javascript:;" class="alphabet-link">Z</a>
        </div>
    </div>
    <style>
        section.anitext {
            text-align: center;
            width: 70%;
        }

        .waviy {
            position: relative;
        }

        .waviy span {
            position: relative;
            display: inline-block;
            font-size: 16px;
            font-weight: 800;
            color: #fff;
            text-transform: uppercase;
            animation: flip 5s infinite;
            animation-delay: calc(.5s * var(--i))
        }

        span.newclss {
            font-size: 25px;
            font-weight: 900;
        }

        /* @keyframes flip {
  
        0%,
        80% {
          transform: rotateY(360deg)
        }
       
      } */
    </style>

    <section class="anitext">
        <div class="waviy">
        </div>
    </section>

</div>


<script>

$(document).ready(function() {
    var searchFrom = "brand";
    $('#searchDrugOption').on('keyup', function() {
        var searchKeyword = $(this).val();
        console.log("searchKeyword===", searchKeyword.length)
        if(searchKeyword.length > 0) {
            $.ajax({
                url: '{{ url('/')}}/search',
                type: 'GET',
                dataType: 'json',
                data: {
                    keyword: searchKeyword,
                    searchfrom: searchFrom
                },
                success: function(response) {
                    console.log("Search-> ", response);
                    data = response.data;

                    $('#searchDrugOptionautocomplete-list').html('');
                
                    $.each(data, function(index, item){
                       var id='';
                       var name='';
                       var originalName = '';

                       switch (searchFrom) {
                            case 'brand':               
                                id = item.brand_id;
                                originalName = item.brand_name + " " + item.dosage_form.dosageform_name;
                                break;
                            case 'generic':
                                id = item.generic_id;
                                originalName = item.generic_name;
                                break;
                            case 'indication':
                                id = item.indication_id;
                                originalName = item.indication_name;
                                break;
                            case 'manufacturer':
                                id = item.manufacturer_id;
                                originalName = item.manufacturer_name;
                                break;
                            default:
                                break;
                        }
                       

                        name = originalName.replace(new RegExp("^" + searchKeyword, "i"), "");
                        // 
                        $("#searchDrugOptionautocomplete-list").append(`
                            <div style="text-transform: uppercase;" class="searchProduct" >
                                <strong>${searchKeyword}</strong>${name}<input type="hidden" value="${id}">
                            </div>
                        `);
                    })
                    
                    // $('#searchDrugOptionautocomplete-list').html(response);
                }
            });
        } else {
            $('#searchDrugOptionautocomplete-list').empty();
        }
    });

    $('#searchDrugOptionautocomplete-list').on('click', '.searchProduct', function() {
        var id = $(this).find('input').val();
       
        switch (searchFrom) {
                case 'brand':               
                    window.location.href = "{{ url('/') }}/brand_information/"+id
                    break;
                case 'generic':
                    window.location.href = "{{ url('/') }}/generic_detail/"+id
                    break;
                case 'indication':
                    window.location.href = "{{ url('/') }}/indication_detail/"+id
                    break;
                case 'manufacturer':
                    window.location.href = "{{ url('/') }}/manufacturer_detail/"+id
                    break;
                default:
                    break;
            }
    })
    $('.alphabet-link').click(function() {
        var alphabet = $(this).text();
        console.log("alphabet_=-=-=-=-=-=", alphabet)

        
    console.log("searchFrom=-=-=-=-=-=", searchFrom)
        switch (searchFrom) {
            case 'brand':               
                window.location.href = "{{ url('/') }}/search/brand/"+alphabet
                break;
            case 'generic':
                window.location.href = "{{ url('/') }}/search/generic/"+alphabet
                break;
            case 'indication':
                window.location.href = "{{ url('/') }}/search/indication/"+alphabet
                break;
            case 'manufacturer':
                window.location.href = "{{ url('/') }}/search/manufacturer/"+alphabet
                break;
            default:
                break;
        }
        
        
        console.log(alphabet);
        console.log(searchFrom)
    });
    $('.search_option_type').click(function() {
        var searchParam = $(this).text().toLowerCase();
        $('ul.search-tabs li').removeClass('active')

        switch (searchParam) {
            case 'brand':
            // case 'brand_by_alphabetically':
                searchFrom = 'brand';
                search_options = searchMethod.searchOptionForBrand;
                $('ul.search-tabs li.brand').addClass('active');
                break;
            case 'generic':
            // case 'generic_by_alphabetically':
                searchFrom = 'generic';
                search_options = searchMethod.searchOptionForGeneric;
                $('ul.search-tabs li.generic').addClass('active');
                break;
            case 'indication':
                searchFrom = 'indication';
                search_options = searchMethod.searchOptionForIndication;
                $('ul.search-tabs li.indication').addClass('active');
                break;
            case 'manufacturer':
                searchFrom = 'manufacturer';
                search_options = searchMethod.searchOptionForManufacturer;
                $('ul.search-tabs li.manufacture').addClass('active');
                break;
            default:
                break;
        }

        console.log(searchParam);
        console.log(searchFrom)
    });

    
    
    var searchMethod = {
        changeSearchOption: function(param){
            $('ul.search-tabs li').removeClass('active');
            switch (param) {
                case 'brand':
                case 'brand_by_alphabetically':
                    searchFrom = 'brand';
                    search_options = searchMethod.searchOptionForBrand;
                    $('ul.search-tabs li.brand').addClass('active');
                    break;
                case 'generic':
                case 'generic_by_alphabetically':
                    searchFrom = 'generic';
                    search_options = searchMethod.searchOptionForGeneric;
                    $('ul.search-tabs li.generic').addClass('active');
                    break;
                case 'indication':
                    searchFrom = 'indication';
                    search_options = searchMethod.searchOptionForIndication;
                    $('ul.search-tabs li.indication').addClass('active');
                    break;
                case 'manufacturer':
                    searchFrom = 'manufacturer';
                    search_options = searchMethod.searchOptionForManufacturer;
                    $('ul.search-tabs li.manufacture').addClass('active');
                    break;
                default:
                    break;
            }
        },
        searchProduct: function(param){
            console.log(searchFrom);
            console.log(param);
            switch (searchFrom) {
                case 'brand':               
                    window.location.href = "{{ url('/') }}/brand_information/"+param
                    break;
                case 'generic':
                case 'generic_by_alphabetically':
                    searchFrom = 'generic';
                    search_options = searchMethod.searchOptionForGeneric;
                    $('ul.search-tabs li.generic').addClass('active');
                    break;
                case 'indication':
                    searchFrom = 'indication';
                    search_options = searchMethod.searchOptionForIndication;
                    $('ul.search-tabs li.indication').addClass('active');
                    break;
                case 'manufacturer':
                    searchFrom = 'manufacturer';
                    search_options = searchMethod.searchOptionForManufacturer;
                    $('ul.search-tabs li.manufacture').addClass('active');
                    break;
                default:
                    break;
            }

            
            
        },
        check: function(){
            console.log("testing Search Method==================")
        }

    }
    searchMethod.check();
});
</script>
