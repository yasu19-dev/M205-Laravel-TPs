1.D
2.A
3.C
4.B
5.A
6.A
7.C
8.B
9.D
10.B

1. - Creer un nouveau projet
`composer create-project laravel/laravel gestionReservation`
- Configurer bd dans .env
`DB_DATABASE=gestionReservation`

2. Creer les migrations 
`php artisan make:migration create_pays_table`
`php artisan make:migration create_hotels_table`
`php artisan make:migration create_touristes_table`
`php artisan make:migration create_reservations_table`
`php artisan make:migration create_plannings_table`

3. Ajouter au migrations les champs necessaires:
    use Illuminate\Facades\Schema;

- Dans ``create_pays_table.php``:
   public function up(){
        Schema::create('pays', function (Blueprint $table)){
            $table->id('idpays');
            $table->string('nom');
            $table->string('description', 50);
            $table->timestamps();
        }
    }
- Dans ``create_hotels_table.php``:
    public function up(){
        Schema::create('hotels', function (Blueprint $table)){
            $table->id('idhotel');
            $table->string('nom');
            $table->string('description', 50);
            $table->integer('nombreetoiles');
            $table->ForeingId('idpays')->constrainted('pays');
            $table->timestamps();
        }
    }

- Dans ``create_touristes_table.php``:
    public function up(){
        Schema::create('touristes', function (Blueprint $table)){
            $table->id('idtouriste');
            $table->string('nom');
            $table->string('prenom');
            $table->ForeingId('idpays')->constrainted('pays');
            $table->timestamps();
        }
    }

- Dans ``create_reservations_table.php``:
    public function up(){
        Schema::create('reservations', function (Blueprint $table)){
            $table->id('idreservation');
            $table->date('datereservation');
            $table->ForeingId('idtouriste')->constrainted('touristes');
            $table->timestamps();
        }
    }

- Dans ``create_plannings_table.php``:
    public function up(){
        Schema::create('plannings', function (Blueprint $table)){
            $table->ForeingId('idhotel')->constrainted('hotels');
            $table->ForeingId('idreservation')->constrainted('reservations');
            $table->primary(['idhotel','idreservation']);
            $table->integer('nombrenuits');
            $table->timestamps();
        }
    }

- Execution des migrations: `php artisan migrate`

4. Créer les modeles necessaires et ajouter les relations entre les tables

`php artisan make:model PaysModel`
`php artisan make:model HotelModel`
`php artisan make:model TouristeModel`
`php artisan make:model ReservationModel`
`php artisan make:model PlanningModel`

- Dans `App\Models\PaysModel.php`:
    class PaysModel extends Model {
        use HasFactory
        public function touristes(){
            return $this->hasMany(TouristeModel::class, 'idpays');
        }

        public function hotels(){
            return $this->hasMany(HotelModel::class, 'idpays');
        }
    }


- Dans `App\Models\HotelModel.php`:

    class HotelModel extends Model {
            use HasFactory;
            public function pays(){
                return $this->belongsTo(PaysModel::class, 'idpays');
            }

            public function plannings(){
                return $this->hasMany(PlanningModel::class, 'idhotel');
            }
        }

- Dans `App\Models\TouristeModel.php`:

- Dans `App\Models\ReservationModel.php`:

- Dans `App\Models\ PlanningModel.php`:

5. Ajouter 50 lignes de données d''essaies dans la table Hotel

5.1) `php artisan make:factory HotelFactory`
 Dans `HotelFactory.php`:
    class HotelFactory extends Factory{
        public function definition(){
        return [
            'nom' => fake()->firstName(10),
            'description' => fake()->paragraph(25),
            'nombreetoiles'=> fake()->numberBetween(1,5),
            'idpays'->fake()->PaysModel::factory()
        ]
    }
    }
5.2) `php artisan make:seeder HotelTableSeeder`
    Dans ``HotelTableSeeder.php`` :
     class HotelTableSeeder extends Seeder {
        public function run(){
            \App\Models\HotelModel::factory(50)->create();
        }
     }
    

6. Créer un contrôleur HotelController qui permet de créer les méthodes pour la gestion de la table Hotel, écrire le code à mettre dans les différentes méthodes du contrôleur suivantes:

`php artisan make:controller HotelController -ressource`

a. La méthode AfficherListeHotels: qui permet de retourner la liste des hôtels dans la vue index.blade.php. 2pts


b. La méthode AjouterHotel: qui permet d'ajouter un nouvel hôtel dans la table Hotel puis rediriger vers l'action AfficherListeHotels. (faire la validation qui assure que le champ idhotel est requis lors de l'ajout). 2pts

c. La méthode SupprimerHotel: qui permet de supprimer un hôtel dont l'Identifiant est passé en paramètre puis rediriger vers l'action AfficherListeHotels.
