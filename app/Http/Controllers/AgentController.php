<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JdAgentPageConf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AgentController extends Controller
{
    // ########## start auth ##########
    function getLogin()
    {
        return view('jago-digital.pages.auth.login');
    }

    function postLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('agent.getDashboard');
        } else {
            return back();
        }
    }

    function postLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('agent.login');
    }
    // ########## end auth ##########

    // ########## start agent CRUD ##########
    public function getDashboard()
    {
        // check existing agent data
        $agent = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        if (!$agent) { // if data doesn't exist, create new agent data
            $create = JdAgentPageConf::create([
                'page_name' => 'Maxy Academy',
                'slug' => Auth::user()->id,
                'user_id' => Auth::user()->id,
                'content_setting' => '[{"name":"hero_title","value":"MAXY ACADEMY","type":"text"},{"name":"hero_subtitle","value":"Solusi buat kamu yang lagi cari pengalaman magang! Dapatkan kesempatan paid internship di perusahaan ternama!","type":"text"},{"name":"hero_img","value":"jd-hero-img.png","type":"image"},{"name":"section2_title","value":"APA YANG AKAN KAMU DAPATKAN","type":"text"},{"name":"section2_content","value":"Maxians akan mendapatkan...","type":"text"},{"name":"section2_item1_title","value":"Keterampilan","type":"text"},{"name":"section2_item1_content","value":"Memperoleh keterampilan langsung yang relevan dengan industri saat ini","type":"text"},{"name":"section2_item2_title","value":"Relasi","type":"text"},{"name":"section2_item2_content","value":"Kesempatan untuk membangun hubungan dengan profesional dan mentor","type":"text"},{"name":"section2_item3_title","value":"Peluang","type":"text"},{"name":"section2_item3_content","value":"Peluang untuk belajar melalui proyek langsung dan studi kasus praktis","type":"text"},{"name":"section2_item4_title","value":"Berwirausaha","type":"text"},{"name":"section2_item4_content","value":"Berkontribusi pada solusi sosial dan lingkungan melalui kewirausahaan sosial","type":"text"},{"name":"section3_tab1_tabname","value":"Professional Bootcamp","type":"text"},{"name":"section3_tab2_tabname","value":"Sociopreneurship","type":"text"},{"name":"section3_tab1_title","value":"Professional Bootcamp","type":"text"},{"name":"section3_tab1_content","value":"Profesional bootcamp adalah program pelatihan intensif jangka pendek untuk mengajarkan keterampilan khusus dalam waktu singkat, terutama di bidang teknologi, pemrograman, desain, atau pemasaran digital, yang mempersiapkan peserta agar siap kerja atau meningkatkan keahlian mereka. Maxy Academy berharap dapat mendukung kamu yang ingin menciptakan dampak positif terhadap lingkungan dan sosial.","type":"text"},{"name":"section3_tab1_item1_content","value":"Pelajari pemrograman backend dengan Laravel. Kuasai konsep routing, model, kontroler, manajemen basis data, otentikasi, API dengan Laravel Passport, serta pengujian dan optimasi performa. Jadilah pengembang backend handal!","type":"text"},{"name":"section3_tab1_item1_img","value":"jd-bootcamp-backend.png","type":"image"},{"name":"section3_tab1_item2_content","value":"Pelajari frontend dengan React. Kuasai komponen, state, props, Redux, dan CSS-in-JS. Bangun antarmuka pengguna dinamis dan interaktif. Jadi pengembang frontend handal!","type":"text"},{"name":"section3_tab1_item2_img","value":"jd-bootcamp-frontend.png","type":"image"},{"name":"section3_tab1_item3_content","value":"Pelajari desain UI\/UX. Kuasai prinsip desain, wireframing, dan prototyping. Pelajari penggunaan tools seperti Figma dan Adobe XD. Tingkatkan keterampilan dalam menciptakan antarmuka yang intuitif dan user-friendly. Jadilah desainer UI\/UX handal!","type":"text"},{"name":"section3_tab1_item3_img","value":"jd-bootcamp-uiux.png","type":"image"},{"name":"section3_tab1_item4_content","value":"Pelajari digital marketing. Kuasai SEO, SEM, dan media sosial. Pelajari analitik dan strategi konten. Tingkatkan keterampilan untuk kampanye pemasaran yang efektif. Jadilah ahli digital marketing handal!","type":"text"},{"name":"section3_tab1_item4_img","value":"jd-bootcamp-digmar.png","type":"image"},{"name":"section3_tab2_title","value":"SOCIOPRENEURSHIP","type":"text"},{"name":"section3_tab2_img","value":"jd-sociopreneur.png","type":"image"},{"name":"section3_tab2_content","value":"Sociopreneurship bootcamp course merupakan sebuah inkubator bisnis dimana kamu dapat mengembangkan ide bisnis dalam ruang lingkup Sustainable Development Goals dan mendapatkan kesempatan pendanaan (funding). Maxy Academy berharap dapat mendukung Kamu yang ingin menciptakan dampak terhadap lingkungan dan sosial.","type":"text"},{"name":"section4_title","value":"MENGAPA MAXY","type":"text"},{"name":"section4_img","value":"jd-agent-img.png","type":"image"},{"name":"section4_content","value":"Maxy rogram pelatihan technology dan digital yang dilakukan secara intensif selama 1 bulan untuk mempersiapkan mahasiswa yang mampu menjawab kebutuhan industri.","type":"text"},{"name":"section5_title","value":"APA KATA MAXIANS TENTANG MAXY ACADEMY","type":"text"},{"name":"section5_content","value":"Yuk simak apa pendapat mereka...","type":"text"},{"name":"section6_title","value":"HUBUNGI KAMI","type":"text"},{"name":"section6_img","value":"jd-contact-us.png","type":"image"},{"name":"section6_content","value":"Halo Maxians! Masih bingung dengan penjelasan di atas? Silahkan tanyakan dibawah ini.","type":"text"},{"name":"footer_img","value":"jd-footer-banner.png","type":"image"}]',
                'testimonial_setting' => '[{"name":"Diana Maksari","image":"jd-testi1.png","city":"Makassar","rating":5,"content":"Saya sangat terkesan dengan Jago Digital. Mereka tidak hanya mengajarkan teori, tetapi juga praktek langsung yang bisa diaplikasikan dalam pekerjaan. Selalu mengikuti perkembangan teknologi terbaru, membantu saya meningkatkan keterampilan digital dengan cepat.","type":"text"},{"name":"Alexander","image":"jd-testi2.png","city":"Jakarta","rating":5,"content":"Bergabung dengan Jago Digital adalah keputusan terbaik yang pernah saya buat untuk karier saya. Mereka memiliki kurikulum yang sangat terstruktur dan mentor yang sangat berpengalaman. Saya merasa lebih percaya diri dan siap untuk menghadapi tantangan di dunia digital setelah menyelesaikan kursus mereka.","type":"text"},{"name":"Maya Kristina","image":"jd-testi3.png","city":"Surabaya","rating":5,"content":"Terima kasih kepada Jago Digital, saya sekarang memiliki keterampilan yang dibutuhkan untuk sukses di industri teknologi. Pelatihan mereka tidak hanya mengajar saya tentang teknologi terbaru, tetapi juga membantu saya membangun jaringan profesional yang berharga.","type":"text"}]',
                'color_setting' => '[{"name":"primary","value":"#ff6600","type":"text"},{"name":"secondary","value":"#732002","type":"text"},{"name":"font","value":"#ffffff","type":"text"},{"name":"bg_primary","value":"#282c2c","type":"text"},{"name":"bg_secondary","value":"#262829","type":"text"}]',
                'contact_setting' => '[{"name":"wa_number","value":"628123123123","type":"text"},{"name":"wa_preview_text","value":"Halo Minmax! Mau tanya nih...","type":"text"},{"name":"agent_name","value":"William","type":"text"},{"name":"agent_email","value":"william@gmail.com","type":"text"}]',
                'status' => 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            $source = public_path('jago-digital/agent/assets/img');
            $destination = public_path('jago-digital/agent/' . Auth::id() . '/img');

            // Check if source folder exists
            if (!File::exists($source)) {
                return response()->json(['error' => 'Source folder does not exist'], 404);
            }

            // Create destination folder if it doesn't exist
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            // Get all image files from the source folder
            $images = File::files($source);

            foreach ($images as $image) {
                $imagePath = $image->getRealPath();
                $imageName = $image->getFilename();

                // Copy image to destination folder
                File::copy($imagePath, $destination . '/' . $imageName);
            }

            if (!$create) {
                return redirect()->back()->with('error', 'failed to create new agent! please contact admin for help.');
            }
        }
        return view('jago-digital.pages.dashboard.index');
    }
    public function getContent()
    {
        $data = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        $content_data = json_decode($data->content_setting);
        // dd($content_data);
        return view('jago-digital.pages.content.edit', compact('content_data'));
    }
    public function postContent(Request $request)
    {
        // dd($request->all());

        $pageConfig  = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        if (!$pageConfig) {
            return redirect()->back()->with('error', 'user page config not found');
        }

        $data = json_decode($pageConfig->content_setting);

        // nested loop to find the index of array that needs to be changed
        foreach ($data as $d) {
            foreach ($request->all() as $key => $value) {
                if ($d->name == $key) { // if index name = input name
                    // if type is file, save the file with the same name as before (reducing storage usage)
                    if ($request->hasFile($key)) {
                        $file = $request->file($key);
                        $userId = Auth::id();
                        $fileName = $key . '.' . $file->getClientOriginalExtension();
                        $filePath = 'jago-digital/agent/' . $userId . '/img/' . $fileName;

                        // save the file
                        $file->move(public_path('jago-digital/agent/' . $userId . '/img'), $fileName);
                        $d->value = $fileName; // change data on array to new data filename
                    } else {
                        $d->value = $value; // change data on array to new data
                    }
                }
            }
        }
        // dd($data);

        $pageConfig->content_setting = json_encode($data);
        $pageConfig->updated_id = Auth::id();
        $pageConfig->updated_at = now();

        $update = $pageConfig->save();

        if ($update) {
            return redirect()->back()->with('success', 'user page config updated successfully.');
        } else {
            return redirect()->back()->with('error', 'failed to update user page config data');
        }
    }
    public function getTestimonial()
    {
        $data = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        $testimonial_data = json_decode($data->testimonial_setting);
        // dd($testimonial_data);

        return view('jago-digital.pages.testimonial.edit', compact('testimonial_data'));
    }
    public function postTestimonial(Request $request)
    {
        // dd($request->all());

        $pageConfig  = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        if (!$pageConfig) {
            return redirect()->back()->with('error', 'color settings not found! please contact admin for help.');
        }

        $data = json_decode($pageConfig->testimonial_setting);

        // dd($data);
        foreach ($data as $k => $v) {
            foreach ($v as $k2 => $v2) {
                $input_name = 'testi' . $k . '-' . $k2;
                if ($k2 == 'image') {
                    if ($request->hasFile($input_name)) {
                        $file = $request->file($input_name);
                        $userId = Auth::id();
                        $img_index = $k + 1;
                        $fileName =  'jd-testi' . $img_index . '.' . $file->getClientOriginalExtension();

                        // save the file
                        $file->move(public_path('jago-digital/agent/' . $userId . '/img'), $fileName);
                        $data[$k]->$k2 = $fileName; // change data on array to new data filename
                    }
                } else {
                    $input_name = 'testi' . $k . '-' . $k2;
                    $data[$k]->$k2 = $request->$input_name; // change data on array to new data
                }
            }
        }

        $pageConfig->testimonial_setting = json_encode($data);
        $pageConfig->updated_id = Auth::id();
        $pageConfig->updated_at = now();

        $update = $pageConfig->save();

        if ($update) {
            return redirect()->back()->with('success', 'color settings updated successfully.');
        } else {
            return redirect()->back()->with('error', 'failed to update color settings');
        }

        return view('jago-digital.pages.color.edit');
    }
    public function getColor()
    {
        $data = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        $color_data = json_decode($data->color_setting);
        // dd($content_data);
        return view('jago-digital.pages.color.edit', compact('color_data'));
    }
    public function postColor(Request $request)
    {
        // dd($request->all());

        $pageConfig  = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        if (!$pageConfig) {
            return redirect()->back()->with('error', 'color settings not found! please contact admin for help.');
        }

        $data = json_decode($pageConfig->color_setting);

        // nested loop to find the index of array that needs to be changed
        foreach ($data as $d) {
            foreach ($request->all() as $key => $value) {
                if ($d->name == $key) { // if index name = input name
                    $d->value = $value; // change data on array to new data
                }
            }
        }
        // dd($data);

        $pageConfig->color_setting = json_encode($data);
        $pageConfig->updated_id = Auth::id();
        $pageConfig->updated_at = now();

        $update = $pageConfig->save();

        if ($update) {
            return redirect()->back()->with('success', 'color settings updated successfully.');
        } else {
            return redirect()->back()->with('error', 'failed to update color settings');
        }

        return view('jago-digital.pages.color.edit');
    }
    public function getSetting()
    {
        $data = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        $contact_data = json_decode($data->contact_setting);
        $page_name = $data->page_name;
        $slug = $data->slug;

        return view('jago-digital.pages.contact.edit', compact(['page_name', 'slug', 'contact_data']));
    }
    public function postSetting(Request $request)
    {
        // dd($request->all());

        $pageConfig  = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        if (!$pageConfig) {
            return redirect()->back()->with('error', 'user page config not found');
        }

        // check slug
        $slug_check = JdAgentPageConf::where('slug', $request->slug)->count();
        if ($slug_check) {
            return redirect()->back()->with('error', 'slug has been taken! please use another one');
        }

        // change page name & slug
        $pageConfig->page_name = $request->page_name;
        $pageConfig->slug = $request->slug;

        $data = json_decode($pageConfig->contact_setting);

        // nested loop to find the index of array that needs to be changed
        foreach ($data as $d) {
            foreach ($request->all() as $key => $value) {
                if ($d->name == $key) { // if index name = input name
                    $d->value = $value; // change data on array to new data
                }
            }
        }
        // dd($data);

        $pageConfig->contact_setting = json_encode($data);
        $pageConfig->updated_id = Auth::id();
        $pageConfig->updated_at = now();

        $update = $pageConfig->save();

        if ($update) {
            return redirect()->back()->with('success', 'user page config updated successfully.');
        } else {
            return redirect()->back()->with('error', 'failed to update user page config data');
        }

        return view('jago-digital.pages.contact.edit');
    }
    public function checkSlug(Request $request)
    {
        $slug = $request->query('slug');
        $exists = JdAgentPageConf::where('slug', $slug)->exists();

        return response()->json(['exists' => $exists]);
    }
    // ########## end agent CRUD ##########
}
