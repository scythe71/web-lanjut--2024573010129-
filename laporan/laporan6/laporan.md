# Laporan Modul 6: Model dan Laravel Eloquent
**Mata Kuliah:** Workshop Web Lanjut   
**Nama:** Ammar  
**NIM:** 2024573010129  
**Kelas:** TI2B  

---

## Abstrak
Laporan ini membahas konsep `Model` dan `Eloquent ORM` pada Laravel yang berperan dalam menghubungkan aplikasi dengan database secara efisien menggunakan pendekatan berorientasi objek. Melalui praktikum ini, dilakukan implementasi tiga proyek: `Model Binding Form`, `DTO (Data Transfer Object)`, dan Aplikasi Todo CRUD menggunakan `MySQL`. Hasil praktikum menunjukkan bahwa penggunaan `Eloquent` dan `model` membuat manajemen data lebih terstruktur, efisien, serta mudah dipelihara.

---

## 1. Dasar Teori
### Model di Laravel

Model adalah bagian dari arsitektur `MVC` (Model-View-Controller) yang merepresentasikan data dan logika bisnis aplikasi. Model bertugas berinteraksi dengan database, baik untuk mengambil, menambah, memperbarui, maupun menghapus data.

Laravel menggunakan `Eloquent ORM` (Object Relational Mapping) yang memudahkan developer dalam melakukan operasi database menggunakan sintaks PHP berorientasi objek, bukan query SQL secara langsung.

**Contoh membuat model:**

    php artisan make:model Product
Kode ini akan membuat file model `Product.php` di direktori `app/Models`.

**Contoh penggunaan model:**

        namespace App\Models;

        use Illuminate\Database\Eloquent\Model;

        class Product extends Model
        {
            protected $fillable = ['name', 'price', 'stock'];
        }

### Entities dan POCO (Plain Old Class Object)

Laravel tidak secara ketat menerapkan konsep entitas seperti pada `Domain-Driven Design`, tetapi model dapat diperlakukan sebagai entitas yang merepresentasikan logika bisnis.

**Contoh POCO:**

    class ProductEntity
    {
        public function __construct(
            public string $name,
            public float $price,
            public int $stock,
        ) {}
    }
Kelas ini dapat digunakan secara independen tanpa ketergantungan pada framework Laravel.

### Data Transfer Object (DTO)

DTO digunakan untuk mentransfer data antar lapisan aplikasi dalam format terstruktur. DTO membantu memisahkan data mentah dari logika bisnis dan meningkatkan keterbacaan kode.

**Contoh DTO:**

    namespace App\DTO;

    class ProductDTO
    {
        public function __construct(
            public string $name,
            public float $price,
            public int $stock,
        ) {}

        public static function fromRequest(array $data): self
        {
            return new self(
                $data['name'],
                $data['price'],
                $data['stock']
            );
        }
    }

### Repository Pattern

Repository berfungsi sebagai lapisan abstraksi untuk mengelola logika akses data, sehingga controller tidak berinteraksi langsung dengan database.

**Contoh Interface Repository:**

    interface ProductRepositoryInterface
    {
        public function all();
        public function find(int $id);
        public function create(array $data);
    }

**Contoh Implementasi:**

    use App\Models\Product;

    class ProductRepository implements ProductRepositoryInterface
    {
        public function all() { return Product::all(); }
        public function find(int $id) { return Product::find($id); }
        public function create(array $data) { return Product::create($data); }
    }


---

## 2. Langkah-Langkah Praktikum
### 2.1 Praktikum 1 – Model Binding Form (Tanpa Database)

### 2.2 Praktikum 2 – Data Transfer Object (DTO)

### 2.3 Praktikum 3 – Aplikasi Todo CRUD dengan Eloquent ORM dan MySQL

---

## 3. Hasil dan Pembahasan

Hasil dari tiga praktikum menunjukkan implementasi model di Laravel dalam berbagai skenario:

1. Model Binding Form menegaskan bahwa pemisahan logika data dari view meningkatkan struktur aplikasi.

2. DTO menunjukkan cara pengiriman data antar lapisan tanpa ketergantungan langsung terhadap request.

3. Eloquent ORM memberikan kemudahan dalam operasi CRUD database tanpa menulis query SQL secara manual.

Semua aplikasi berjalan sesuai harapan dan validasi input berfungsi dengan baik. Tampilan menggunakan Bootstrap juga meningkatkan pengalaman pengguna.

--- 

## 4. Kesimpulan

1. Laravel Model dan Eloquent ORM mempermudah pengelolaan data dengan pendekatan berorientasi objek.

2. DTO dan Repository Pattern membantu menjaga arsitektur aplikasi tetap bersih dan terorganisir.

3. Praktikum Todo CRUD menunjukkan implementasi penuh konsep MVC dan ORM yang efisien.

4. Dengan struktur ini, aplikasi menjadi mudah diuji, dikembangkan, dan dipelihara.

---

## 5. Referensi

- Laravel Documentation – Eloquent ORM - https://laravel.com/docs/12.x/eloquent

- Dicoding Blog – Apa Itu MVC? - https://www.dicoding.com/blog/apa-itu-mvc-pahami-konsepnya/

- Modul 6 – Model dan Laravel Eloquent – https://hackmd.io/@mohdrzu/ryIIM1a0ll