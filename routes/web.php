<?php

use App\HomeStyle;
use App\About;
use App\TeamMembers;
use App\Protfolio;
use App\ProtfolioBg;
use App\ProtfolioCategory;
use App\ProtfolioImage;
use App\ProtfolioFaq;
use App\ContactForm;
use App\AppSetting;
use App\HomeSlider;
use App\Acme\FooBar;
use App\Testimonial;
use App\ServicesLists;
use App\TeamType;
use App\InvoiceItem as InvoItem;
use App\InvoiceHead;
use function GuzzleHttp\json_encode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    //check if the database is empty with any records
    $homestyles = HomeStyle::where("status", 1);
    if ($homestyles->count() == 0 || $homestyles->get() == null) {
            Artisan::call('db:seed', [
                '--class' => 'HomeStyelSeeder'
            ]);
            $homestyleobj  = HomeStyle::first(); //update the first record so that it shows the active result 
            $homestyleobj->status = "1";
            $homestyleobj->save();
    }
    //check for homesettings 
         
    if (AppSetting::first() == null) {
        AppSetting::firstOrCreate(
            ['title' => 'You deserve a good design']
        );
    }
    $homename = HomeStyle::where("status",1)->first()->home_style_title;
    switch ($homename) {
        case 'default_home':
            return view('site.home-styles.defaultstyle')
            ->with("sliders", HomeSlider::where('visibilty','yes')->orderBy('image_order')->get())
            ->with("settings", AppSetting::first());
            break;
        case 'home2':
            return view('site.home-styles.home-style-2')->with("settings", AppSetting::first());
            break;
        case 'home5':
            return view('site.home-styles.home-style-5')->with("settings", AppSetting::first());
            break;
        case 'home6':
            return view('site.home-styles.home-style-6')->with("settings", AppSetting::first());
            break;
        case 'home8':
            return view('site.home-styles.home-style-8')->with("settings", AppSetting::first());
            break;
        default:
            return view('site.home-styles.defaultstyle')->with("settings", AppSetting::first());
            break;
    }
});

Route::get('/About', function () {
    return view("site.about")
    ->with("about_info",About::where("id",1)->first())
    ->with('teamtype',TeamType::all())
    ->with("testimonial", Testimonial::all())
    ->with("settings", AppSetting::first());
});


  Route::any('/Protfolio', function () {
       return view("site.protfolio_dashboard")
       ->with('Protfolios',Protfolio::all())
       ->with("Protfoliobg",ProtfolioBg::firstOrFail())
       ->with("pcate",ProtfolioCategory::all())
       ->with("settings", AppSetting::first());
  }); 

  Route::any('Protfolio/show/{id}', function ($id) {
          //dd( ProtfolioImage::where("protfolios_id",$id)->get());
        return view("site.single_protfolio")
        ->with("details", Protfolio::find($id))
        ->with("faqs",ProtfolioFaq::where("protfolios_id",$id)->get())
        ->with("images", ProtfolioImage::where( "protfolios_id",$id)->get())
        ->with("settings", AppSetting::first());
  });

  Route::any('/ContactUs', function () {
       return view("site.contact")
       ->with("contact", ContactForm::first())
       ->with("settings", AppSetting::first());
  });

  

  Route::any('Service', function () {
      return view("site.service-n")
      ->with("settings", AppSetting::first())
      ->with('serviceBg', App\ServiceBg::first())
      ->with('listsServices',App\ServicesLists::all())
      ->with("clients",App\ClientsLists::where('status',1)->get())
      ->with('servicesTop', App\ServiceHolder::all());
    
  });
  /* Route::any( 'Service', function () {
      return view( "site.service-new")->with("settings", AppSetting::first());
  }); */


  Route::group(['prefix' => 'Admin'], function () {
    Auth::routes();
    Route::any('user_lists', "Auth\RegisterController@index")->name('user_list');
    Route::any('Profile', "Auth\RegisterController@profile");
    Route::any('UpdateProfile', "Auth\RegisterController@updateProfile");
    Route::any('edit_user/{user_id}', "Auth\RegisterController@edit");
    Route::any('update_user/{user_id}', "Auth\RegisterController@updateUser");
    Route::any('delete_user/{user_id}', "Auth\RegisterController@destroy");
  });



  

Route::group(['prefix' => 'Admin', 'as' => 'admin.'], function () {

    Route::any('/', function () {
        return redirect('Admin/login');
    });


     Route::any('/Website', function () {
          return view('components.website-control.website-dashboard');
     });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/services', 'HomeController@servicePage')->name('service_page');

    Route::get('/homeSliders', function () {
        return view("components.website-control.sliders.homeslider")
        ->with("sliders", \App\HomeSlider::orderBy('image_order')->get());
    })->name('sliders');

    
    Route::any('reorder_image_slider', "HomeSliderController@reorders");
    Route::resource('sliders', HomeSliderController::class);



    Route::get('/TeamType', function () {
        return view('components.teamtype');
    });


    Route::group(['prefix' => 'Team', 'as' => 'Team.'], function () {
        Route::group(['prefix' => 'Category', 'as' => "Category."], function () {
            Route::any('/', "TeamTypeController@index")->name("catetype");
            Route::any('/newType', "TeamTypeController@store");
            Route::any('/edit/{id}', "TeamTypeController@show");
            Route::any('/update/{id}', "TeamTypeController@update");
            Route::any('/delete/{id}', "TeamTypeController@destroy");
        });
        Route::any('/createForm/{type}', "TeamMembersController@create");
        Route::any("/team_lists", "TeamMembersController@index")->name('teams');
        Route::any("/editMember/{id}", "TeamMembersController@edit");
        Route::any("/updateMember/{id}", "TeamMembersController@update");
        Route::any("/deleteMember/{id}", "TeamMembersController@destroy");
        Route::any("/store_new/{typeid}", "TeamMembersController@store");
        // team view for display
        Route::any('/ourMember', 'TeamMembersController@teamView');
    });

      
      
    //  about us route

    Route::any('AboutUs', "AboutController@index");
    Route::any('/aboutupdate', "AboutController@update");


// services 

    Route::any('/SaveBgInfo', "ServicesController@updateBg");
    Route::any('/SaveserviceInfo', "ServicesController@store");
    Route::any('/Service/{id}/edit', "ServicesController@edit");
    Route::any('/Serviceupdate/{id}', "ServicesController@update");
    Route::any('/delservice/{id}', "ServicesController@destroy");
     
     
    Route::any('SaveServiceList', "ServicesListsController@store");
    Route::any('deletelists/{id}', "ServicesListsController@destroy");

    Route::any('SaveClient', "ClientsListsController@store");
    Route::any('ActionPublish/{id}/{status}', "ClientsListsController@updateStatus");
    Route::any('Client_edit/{id}', "ClientsListsController@edit");
    Route::any('Client_update/{id}', "ClientsListsController@update");
    Route::any('Client_delete/{id}', "ClientsListsController@destroy");


//  contact page 
    Route::any('/Contact-page', function () {
        $contact = \App\ContactForm::find(1);
        if ($contact == null) {
            \App\ContactForm::firstOrCreate(
                ['contact_heading' => 'Contact Bitmap']
            );
        }
        return view("components.website-control.contact.contact")->with("contactInfo", \App\ContactForm::find(1));
    })->name('contact_page');
    Route::any('SaveContactInfo', 'ContactFormController@store');

//  homestyles  
    Route::any('/Home-styles', function () {
        return view("components.website-control.home.home_styles")->with('homestyles',\App\HomeStyle::where('status', 1)->first());
    })->name('home_style_page');

    Route::any('/SaveHomeStyle/{id}', "HomeStyleController@store");


//   app setting
    Route::any('Settings', function () {

        $settings =  \App\AppSetting::find(1);
        if ($settings == null) {
            \App\AppSetting::firstOrCreate(
                ['title' => 'Bitmap :: You deserve a good design ']
            );
        }
        return view("components.website-control.appsetting.app_setting")->with("settinginfo", \App\AppSetting::find(1));
    })->name('setting_page');

    Route::any('/updateContactForm', "AppSettingController@update");


// protfolio 
    Route::group(['prefix' => 'Protfolio', 'as' => 'Protfolio.'], function () {
        Route::group(['prefix' => 'Category', 'as' => 'Category.'], function () {
            Route::any('/', function () {
                return view("components.website-control.protfolio.category")->with("cat_list", App\ProtfolioCategory::all());
            })->name('category_index_page');
            Route::any('SavenewType', "ProtfolioCategoryController@store");
            Route::any('deleteType/{id}', "ProtfolioCategoryController@destroy");
            Route::any('editType/{id}', "ProtfolioCategoryController@edit");
            Route::any('updateType/{id}', "ProtfolioCategoryController@update");
        });

        Route::any('/', function () {
            $prot = \App\ProtfolioBg::find(1);
            if ($prot == null ) {
                \App\ProtfolioBg::firstOrCreate(
                    ['bg_title' => 'Bitmap work History']
                );
            }
            return view("components.website-control.protfolio.protfolio")
                ->with("bginfo", App\ProtfolioBg::first())
                ->with("prottypes", App\ProtfolioCategory::all())
                ->with("protfolios", App\Protfolio::paginate(4));
        })->name("protfolio");

        Route::any('Savepbginfo', "ProtfolioController@update");
        Route::any('saveprotfolio', "ProtfolioController@store");

        Route::any('edit/{id}', function ($id) {
            return view("components.website-control.protfolio.protfolio-edit")
                ->with("prottypes", App\ProtfolioCategory::all())
                ->with("protfolios", App\Protfolio::find($id));
        });

        Route::any('UpdateSave/{id}', "ProtfolioController@edit");


        Route::any('DeleteProtfolio/{id}', "ProtfolioController@destroy");
                    //  images part
        Route::any('{id}/images', function ($id) {
            return view("components.website-control.protfolio.protfolio-images")
                ->with('images', App\ProtfolioImage::where('protfolios_id', $id)->paginate(5));
                            //return \App\ProtfolioImage::all();
        });

        Route::any('saveImgage/{id}', "ProtfolioController@saveImages");
        Route::any('deleteImg/{id}', "ProtfolioController@deleteImages");

                      // prot faq 

        Route::any('{id}/faqs', function ($id) {
            return view("components.website-control.protfolio.protfolio-faq")
                ->with('faqs', \App\ProtfolioFaq::where('protfolios_id', $id)->get());
        });

        Route::any('saveFaqs/{id}', "ProtfolioController@saveFaqs");
        Route::any('delFaqs/{id}', "ProtfolioController@delFaqs");


          });

          Route::any('Testimonials', "TestimonialController@index")->name('testimonial_page');
          Route::any('saveTestimonial', "TestimonialController@store");
          Route::any('Edit_testimonial/{id}', "TestimonialController@edit");
          Route::any('update_testimonial/{id}', "TestimonialController@update");
          Route::any('delete_testimonial/{id}', "TestimonialController@destroy");


          Route::group(['prefix' => 'Invoice'], function () {
                //   making quotation and all that
                Route::any('Create', function () {
                    $itemheads = InvoiceHead::all();
                    $heads = [];
                    foreach ($itemheads as $itemh) {
                        array_push( $heads, $itemh->item_head_name);
                    }
                    return view("components.accessories.qutation")
                    ->with('itemlists', InvoItem::all())
                    ->with('invoHeads', $heads);
                });
                Route::any('/saveNewItemHead', 'InvoiceItem@createNewItemHead');
                Route::any('/delItemHead/{id}', 'InvoiceItem@destroy');

                Route::any('/Items', function () {
                    return view("components.accessories.items")
                    ->with('itemslists', InvoItem::all())
                    ->with('itemHeads',InvoiceHead::all());
                })->name('InvoiceItems');
                Route::any('/saveNew', 'InvoiceItem@store');
                Route::any('/editItems/{id}', 'InvoiceItem@edit');
                Route::any('/updateItems/{id}', 'InvoiceItem@update');
                Route::any('/deleteItems/{id}', 'InvoiceItem@delItems');
              
          });

        
        Route::any('Prev', function () {
            return view( "components.accessories.print_preview");
        });
      
        Route::any('/pdfview', function () {
            //$pdf = App::make('dompdf.wrapper');
            // $pdf->loadHTML('<h1>Test</h1>');

            //$pdf = PDF::loadView('components.accessories.print_the_page');
            $pdf = PDF::loadView( 'components.accessories.test2')->setPaper('a4','Portrait');
            // return $pdf->stream('invoice.pdf');
            //  return view('components.accessories.print_the_page');
            //return view('components.accessories.test2');
            return $pdf->stream();
        });
           
       });

















Route::resource('Admin/projects', 'Project\ProjectController');




Route::resource('Admin/projects/{project_id}/projectExpenses', 'Project\ProjectExpenseController');
/* Route::resource('projectExpenses', 'ProjectExpenseController'); */

Route::resource('Admin/projects/{project_id}/vendorPayments', 'Project\VendorPaymentController');

//project income routing
Route::resource('Admin/projects/{project_id}/projectIncomes', 'Project\ProjectIncomeController');


//loans mangement  
Route::resource('Admin/projects/{project_id}/projectLoands', 'Project\ProjectLoandsController');


//loanpayment
Route::resource('Admin/projects/{project_id}/projectLoands/{loan_id}/projectLoanPayments', 'Project\ProjectLoanPaymentController');



Route::resource('Admin/projects/{project_id}/projectTasks', 'Project\ProjectTaskController');

 /* Route::any('Admin/projects/{project_id}/projectTasks/{task_id}/projectVendors/create',"Project\ProjectVendorController@create")->name('projectvendor'); */

  Route::resource('Admin/projects/{project_id}/task/{task_id}/projectVendors', 'Project\ProjectVendorController');  


  Route::resource('Admin/projects/{project_id}/task/{task_id}/projectTeams', 'Project\ProjectTeamController');





Route::resource('Admin/projects/{project_id}/projectGoods', 'Project\ProjectGoodsController');

/* Route::resource('Admin/projects/{project_id}/projectVendors', 'Project\ProjectVendorsController'); */

// accounts start here

     Route::any('Admin/Accounts/', function () {
        // dd(getTestEmployee());
         return view('components.accounts.dashboard')
        ->with('expenditure',\App\Models\Accounts\Expenditures::get()->sum('amount'))
         ->with('loans',\App\Models\Accounts\EmployeeLoan::get()->sum('amount'))
         ->with('income',\App\Models\Accounts\Income::get()->sum('amount'))
         ->with('saleries',\App\Models\Accounts\Paysalery::get()->sum('payamount'));
     });

Route::resource('Admin/Accounts/expenseTypes', 'Accounts\ExpenseTypeController');


Route::resource('Admin/Accounts/treasures', 'Accounts\TreasuresController');



Route::resource('Admin/Accounts/expenditures', 'Accounts\ExpendituresController');
//filter the expense data by date
 Route::any('Admin/Accounts/expenditures/dates',"Accounts\ExpendituresController@filter");
 




Route::resource('Admin/Accounts/saleryKeys', 'Accounts\SaleryKeysController');

 Route::any('Admin/Accounts/employee_salery', function () {
    return view('components.accounts.employee-salery')->with('teams',\App\TeamMembers::all());
 });


 Route::any('Admin/Accounts/employee_salery/{employee_id}/set', function ($id) {
           
        return view('components.accounts.employee-salery-setup')
           ->with('user',\App\TeamMembers::find($id))
           ->with('keys',\App\Models\Accounts\SaleryKeys::all()); 
 });



 Route::any('Admin/Accounts/employee_salery/{employee_id}/save','Accounts\SalerysetUpController@store');



 Route::any('Admin/Accounts/employee_salery/{employee_id}/pay',function($id){
       return view('components.accounts.pay-salery')
       ->with('user',\App\User::find($id))
       ->with('accountsnames',\App\Models\Accounts\Treasures::get(['account_name','id']))
       ->with('setsalery',\App\Models\Accounts\SetupSelery::where('employee_id',$id)->get())
       ;
 });


  Route::resource('Admin/Accounts/employee_salery/{employee_id}/paysaleries', 'Accounts\PaysaleryController');

Route::resource('Admin/Accounts/incomes', 'Accounts\IncomeController');







Route::resource('Admin/Accounts/employeeLoans', 'Accounts\EmployeeLoanController');
Route::any('Admin/Accounts/employeeLoans/filter', 'Accounts\EmployeeLoanController@filter');




Route::resource('vendorTypes', 'VendorTypeController');

Route::resource('Admin/{vendor_type_id}/vendors', 'VendorController');






//product section starts here
   

Route::any('Admin/products/', function() {
     return view('components.products.product_dashboad');
});



Route::resource('Admin/products/productUnits', 'Products\ProductUnitController');

Route::resource('Admin/products/productCategories', 'Products\ProductCategoryController');



Route::resource('Admin/products/productsLists', 'Products\ProductsListsController');




Route::resource('Admin/Accounts/accountCategories', 'Accounts\AccountCategoryController');

Route::resource('Admin/Accounts/deposites', 'Accounts\DepositesController');



Route::resource('Admin/Accounts/accountExpenses', 'Accounts\AccountExpenseController');