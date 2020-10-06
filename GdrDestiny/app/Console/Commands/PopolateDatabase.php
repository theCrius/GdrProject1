<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;

class PopolateDatabase extends Command
{

    public function insertBreeds(){
        $umani=\App\Breed::insert([[
                'name' => 'Umani',
                'forza' => 10,
                'destrezza' => 13,
                'resistenza' => 18,
                'prontezza' => 10,
                'percezione' => 16,
                'intelligenza' => 17,
                'punti_mente' => 100,
                'punti_corpo'=> 120,
                'descrizione'=>'okokkok',
                'immagini'=>'humanico.png',
                'forzaLimite' => 30,
                'destrezzaLimite' => 30,
                'resistenzaLimite' => 35,
                'prontezzaLimite' => 25,
                'percezioneLimite' => 20,
                'intelligenzaLimite' => 25,
        ],
       
    [
                'name' => 'Insonni',
                'forza' => 15,
                'destrezza' => 17,
                'resistenza' => 10,
                'prontezza' => 20,
                'percezione' => 18,
                'intelligenza' => 15,
                'punti_mente' => 140,
                'punti_corpo'=> 90,
                'descrizione'=>'okokkok',
                'immagini'=>'awoken.png',
                'forzaLimite' => 25,
                'destrezzaLimite' => 35,
                'resistenzaLimite' => 30,
                'prontezzaLimite' => 30,
                'percezioneLimite' => 35,
                'intelligenzaLimite' => 30,
        ],
       
    [       
                'name' => 'Exo',
                'forza' => 20,
                'destrezza' => 16,
                'resistenza' => 20,
                'prontezza' => 15,
                'percezione' => 14,
                'intelligenza' => 13,
                'punti_mente' => 80,
                'punti_corpo'=> 130,
                'descrizione'=>'okokkok',
                'immagini'=>'exo.png',
                'forzaLimite' => 25,
                'destrezzaLimite' => 25,
                'resistenzaLimite' => 35,
                'prontezzaLimite' => 25,
                'percezioneLimite' => 25,
                'intelligenzaLimite' => 25,

        ]
    
    
    
    
        ]);
    }
    public function insertHemisperes(){
        
            $hemisperes=\App\Hemispere::insert([
               
            [
                    'name' => 'emisfero destro',
                    'descrizione' =>'okfokdfkokdf',
                    'immagini' => 'emidx.png',           
                ],
               
            [
                    'name' => 'emisfero sinistro',
                    'descrizione' =>'okfokdfkokdf',
                    'immagini' => 'emisx.png',           
                ]
            ]);
    }

    public function insertClasses(){
        $classes=\App\Classe::insert([
           
        [
                'name' => 'Cittadino',
                'immagine' => 'cittadino.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Sinners',
                'immagine' => 'sinners.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Survivor',
                'immagine' => 'survivor.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Tech-Fighter',
                'immagine' => 'tfighter.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Hunter',
                'immagine' => 'hunter.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Titan',
                'immagine' => 'titan.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Warlock',
                'immagine' => 'warlock.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Pilota',
                'immagine' => 'airman.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Geniere',
                'immagine' => 'geniere.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Dottore',
                'immagine' => 'dottore.png',
                'descrizione' => 'okok'
            ],
           
        [
                'name' => 'Cyberwalker',
                'immagine' => 'cyberwalker.png',
                'descrizione' => 'okok'
            ],
            
           

        ]);
    }

     public function insertSkills(){
         $skills_classe=\App\Skill::insert([           
            [
                'name' => 'AS Pilot',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
    'description' => 'Abilità che permette di mettersi alla guida dei Mecha appartenenti alla categoria Arm Slaves',
],
[
                'name' => 'EVA Pilot',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
    'description' => 'Abilità che permette di mettersi alla guida dei Mecha appartenenti alla categoria Evangelion',
],
[
                'name' => 'Riflessi Pronti',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
    'description' => 'Permette di avere reazioni più scattanti durante un combattimento grazie a precisi addestramenti.',
],
[
                'name' => 'SHAS Licence',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
    'description' => 'Permette di pilotare astori e piccoli aerei.',
],
[
                'name' => 'Tempo Prezioso',
                'id_classe'=>  \App\Classe::select('id')->where('name','Pilota')->get()[0]->id,
    'description' => 'Grazie a precisi addestramenti a cui vengono sottoposti i piloti si è in grado di avere totale controllo sul proprio battito cardiaco portandolo anche a pochissimi battiti al minuto se necessario. ',
],
[
                'name' => 'Medicina',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
                'description' => 'Ogni genere di conoscenza nel campo per la cura dell\'essere umano sia sul piano mentale che fisico',
],
[
                'name' => 'Biologia',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
    'description' => 'Studio di tutto ciò che riguarda il mondo di fauna e flora',
],
[
                'name' => 'Medicina d\'Assalto',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
    'description' => 'L\'applicazione della medicina in battaglia non più allo scopo difensivo, ma offensivo. Chi possiede questa abilità è in grado di usare le sue conoscenze mediche per creare tonici e veleni da usare in battaglia.',
],
[
                'name' => 'Patologo',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
    'description' => 'Studio di qualsiasi genere di malattia o pandemia.',
],
[
                'name' => 'Eva Healer',
                'id_classe'=>  \App\Classe::select('id')->where('name','Dottore')->get()[0]->id,
    'description' => 'Studio necessario per la conoscenza delle unità Eva che permette di affiancare i meccanici durante le riparazioni, importante anche per lo sviluppo biorganico di nuove unità',
],
[
                'name' => 'Mecha Physician',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
    'description' => 'Abilità necessaria per la riparazione della maggior parte dei mecha di origine meccanica',
],
[
                'name' => 'T-Operator',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
    'description' => 'Conoscenze informatiche, sono in grado di interfacciarsi a qualsiasi genere di periferica avanzata.',
],
[
                'name' => 'Eva Physician',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
    'description' => 'Abilità che permette al meccanico di occuparsi delle unità Evangelion conoscendone in maniera approfondita il funzionamento.',
],
[
                'name' => 'Equipment Designer',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
    'description' => 'Abilità che permette lo sviluppo di equipaggiamenti per qualsiasi tipologia di Mecha',
],
[
                'name' => 'Genio d\'Assalto',
                'id_classe'=>  \App\Classe::select('id')->where('name','Geniere')->get()[0]->id,
    'description' => 'Addestramenti e preparazioni tecniche permettono a queste persone di agire direttamente sul campo durante un\'operazione per riparare un mecha o controllare l\'artiglieria pesante schierata. ',
],
[
                'name' => 'Furia dello Spirito',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
    'description' => 'Un amico in difficoltà, una ferita troppo grave o semplicemente un nemico troppo forte.
Ecco cosa porta il tuo spirito ad infuocarsi fino a farti divenire schiavo di una furia che si spegnerà solo quando il tuo avversario sarà stato abbattuto.
Conferisce un +2 alle statistiche fisiche, ma impedisce di tirarsi indietro in un combattimento fino a quando il bersaglio della propria rabbia non è stato sconfitto o si viene abbattuti.',
],
[
                'name' => 'Gambler',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
    'description' => 'Il personaggio ha più probabilità di sopravvivere rispetto agli altri, quando tenta di fare azioni rischiose, si possono compiere azioni avventate rischiando meno delle persone comuni, questo non vuol dire farcela sicuramente ma, certamente, in una situazione disperata si avranno maggiori probabilità di cavarsela rispetto ad altri.',
],
[
                'name' => 'Metabolismo Adattivo',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
    'description' => 'Posseggono un metabolismo che non è né veloce né lento, ma gli permette sempre di trarre il massimo nutrimento da ciò che assumono e questo rende più difficile per queste persone morire di stenti, inoltre, nel momento di una intossicazione tende invece a rallentare aiutando così a contrastare eventuali situazioni che, con un metabolismo veloce, finirebbero per precipitare.',
],
[
                'name' => 'Natural Survival',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
    'description' => 'Accendere un fuoco, trovare cibi commestibili in ambienti ostili o costruire un rifugio d\'emergenza, si possediono tutte le abilità per cavarsela anche nei posti meno ospitali del pianeta.',
],
[
                'name' => 'Immunità alle Infenzioni',
                'id_classe'=>  \App\Classe::select('id')->where('name','Survivor')->get()[0]->id,
    'description' => 'Una vita a contatto con ambienti non molto puliti e la continua esposizione dell\'organismo a tossine gli ha permesso di divenire totalmente immune alle infenzioni. ',
],
[
                'name' => 'Vivremo per Sempre',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
    'description' => 'Ad un Sinners non è concesso morire, infatti, il loro Ghost è programmato per tenere insieme il loro corpo il più possibile ed è schermato per rendere più difficile la sua distruzione.
Le ferite non vengono sanate, ma semplicemente viene inibito qualsiasi dolore ed una frequenza precisa che solo loro possono avvertire porta il Sinners ad entrare in uno stato di trance in cui diviene inarrestabile.
I danni inflitti in questo status sono da considerarsi tutti critici, ma al termine di questa condizione(tre turni), il Sinners cade in coma e deve essere necessariamente portato in una struttura ospedaliera per sopravvivere.(Attivabile con meno del 50% della vita)',
],
[
                'name' => 'Voci del Vuoto',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
    'description' => '“Alzati e splendi, lavora sodo, fatti un nome,
Prendi la mira, premi il grilletto, non cadere nel precipizio,
Impara il valore della fede e della famiglia, e non lamentarti,
sfrutta al massimo ogni momento propizio."”

Voci confuse, ma onnipresenti nella tua mente.
Abbassati, corri, non andare in quella direzione oppure segui quella luce.
Non sono mai consigli chiari, ma sono onnipresenti nella tua mente.
Quei sussurri sono nelle tue orecchie, tu li ascolterai?
__

Durante le quest come in libera potrebbero arrivare dei sussurri con delle informazioni, sarà il giocatore a scegliere come sfruttarle.',
],
[
                'name' => 'Dono di Lasa',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
    'description' => 'La tua abilità sta nel riuscire a copiare perfettamente il soggetto su cui ti focalizzi, sia esso una persona od un\'animale fino a fargli perfino credere di leggergli nel pensiero, naturalmente per poter imitare è importante l\'osservazione del soggetto di cui si desiderano copiare i modi.
Per due turni è necessario focalizzare l\'attenzione sul proprio bersaglio, successivamente, per quattro turni si riuscirà a copiarne perfettamente tutti i movimenti in maniera speculare.
',
],
[
                'name' => 'Maledizione del Rovo',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
    'description' => 'Un anello viene posto sulla mano dominante del Sinners, questo anello è in grado di materializzare un rovo che può essere usato in svariati modi contro il nemico:

- Rampino per aggrapparsi alle superfici
- Immobilizzare un arto nemico
- Ferirlo usandolo alla stregua di una frusta

Il potere del rovo è dato dalla resistenza e dalla forza del possessore che viene centuplicata rendendo, in alcuni casi, il rovo praticamente indistruttibile.',
],
[
                'name' => 'Agony Arc',
                'id_classe'=>  \App\Classe::select('id')->where('name','Sinners')->get()[0]->id,
    'description' => 'Armi modulatori profondamente legate all\'impronta genetica del possessore, essere hanno diverse forme e, solitamente, simboleggiano l\'anima del loro padrone, risiedono all\'interno di bracciali che il Sinners non può mai togliere e che permette di evocarla.
Inoltre queste armi hanno un\'importante particolarità: se il possessore cede una parte del proprio sangue esse diventano ancora più resistenti e, per questo, in grado di arreccare pesanti danni al nemico per un numero di turni pari alla resistenza/3.
',
],
[
                'name' => 'Knights Pilot',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
    'description' => 'Abilità propria dei Cyber Walker, li rende in grado di interfacciarsi totalmente con questo genere di esoscheletro, i più abili sono anche in grado usarlo in remoto sfruttando il Ghost per interfacciarsi alla propria armatura.
',
],
[
                'name' => 'DIY Master',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
    'description' => 'non avendo la possibilità di disporre di molto, sono artisti nel riuscire ad utilizzare qualsiasi cosa per le riparazioni.
',
],
[
                'name' => 'Ad Ogni Costo',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
    'description' => 'Niente può fermarti, la tua feroce tenacia nella situazioni disperate di consente di sopportare per maggiore tempo lesioni e ferite.
(Nessun malus nelle azioni anche con 75% di PF in meno)
',
],
[
                'name' => 'Tracker',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
    'description' => 'Un occhio allenato e dei sensi abituati alla ricerca ti portano ad essere estremamente abile quando si tratta di cercare qualcosa che sia una persona od un oggetto è difficile che qualcosa ti sfugga.
Riconosci a colpo d\'occhio chi ha lasciato una traccia se è qualcosa di conosciuto ed anche l\'eventuale peso, individui odori anomali per una data zona e sai dare un nome a molti, assaggiando le sostanze riesci anche a comprendere cosa sono, sebbene quest\'ultimo genere di ricerca abbia chiaramente un buon tasso di rischio.
Non tutto, in fondo, è innocuo per il corpo umano.',
],
[
                'name' => 'Rilocatore',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cyberwalker')->get()[0]->id,
    'description' => 'Attraverso l\'installazione di un sistema biotecnologico estremamente elaborato all\'interno dello scheletro si diventa in grado di teletrasportarsi per brevi distante per mezzo di un dispositivo che scompone le molecole del possessore ricollocandole dove si trova. 

Utilizzo

Il traslocatore ha un raggio di azioni di 20 metri entro i quali ci si può teletrasportare.

I Turno:  Lancio/Posizionamento traslocatore
Dal II turno è attivo e si può scegliere se compiere un\'azione dopo essersi traslocati o sfruttarlo in seguito.',
],
[
                'name' => 'C-Builter',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
    'description' => 'La tecnologia non ha segreti e, infatti, riescono a creare dal nulla i più disparati oggetti da poter sfruttare in un combattimento: scudi, droni ed anche armi sebbene si tratti sempre di equipaggiamenti ad uso umano e non adatti per esoscheletri o mecha.
',
],
[
                'name' => 'ATST',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
    'description' => '
Fare più cose nello stesso istante, per loro, non sembra risultare problematico e, anzi, risulta stimolante per farli rendere al meglio.
Nel momento in cui si trovano in situazioni di tensione od obbligati ad essere veloci nel compiere dei procedimenti risultano più concentrati ed hanno la possibilità di una maggiore riuscita delle loro azioni.

Utilizzo: una volta per quest, nel momento in cui si dichiara l\'utilizzo dell\'abilità possono compiere un\'azione bonus rispetto a quelle a disposizione che avrà sicuramente successo.',
],
[
                'name' => 'Black-Technology',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
    'description' => '
Abilità che permette di conoscere le ricerche che riguardano questa particolare tecnologia fino a poter perfino adoperarne i dati per creare nuove invenzioni che partono proprio da questi progetti. 
Possedere queste conoscenze, tuttavia, è un\'arma a doppio taglio, in quanto essendo informazioni sono estremamente ricercate sia da persone con buone intenzioni che da altre meno propense alla diplomazia.',
],
[
                'name' => 'Vexaniacs',
                'id_classe'=>  \App\Classe::select('id')->where('name','Tech-Fighter')->get()[0]->id,
    'description' => 'Amanti dei Vex? Certo!
Siete sempre i primi a sapere dove un\'esponente di questa particolare razza è stato abbattuto, conoscete perfino parte dei loro cimiteri e questo vi dà accesso ad interessanti pezzi di ricambio e tecnologia "proibita" da sfruttare per i vostri scopi.',
],
[
                'name' => 'Espressione Artistica',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
    'description' => 'Hanno uno o più campi in cui sono versati, possono essere artigiani oppure semplicemente ballerini, pittori.',
],
[
                'name' => 'Rissa',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
    'description' => 'Sanno cavarsela molto bene nel corpo a corpo, qualsiasi cosa per loro può divenire un\'arma',
],
[
                'name' => 'Legge',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
    'description' => 'Per loro regole e cavilli non sono un mistero, vivendo ogni singolo giorno la città sanno come fare le cose correttamente..o come girare intorno ad una regola così bene da rimanere sempre sul corretto confine',
],
[
                'name' => 'Conoscenza della Strada',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
    'description' => 'Quello è un quartiere da evitare? Quello è un quartiere buono? Dove sarà il prossimo incontro clandestino? Le voci ti arrivano e sai bene cosa fare per i tuoi giri',
],
[
                'name' => 'Buon Senso',
                'id_classe'=>  \App\Classe::select('id')->where('name','Cittadino')->get()[0]->id,
    'description' => 'La vita quotidiana ti ha insegnato quando una situazione è meglio evitarla, già, anche con un semplice colpo d\'occhio i più esperti sanno quando una cosa è troppo rischiosa.',
],
[
                'name' => 'Combattimento con Armi da Fuoco(Media e Lunga Distanza)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Hunter')->get()[0]->id,
    'description' => 'Abilità che ottimizza l\'utilizzo di armi che colpiscono dai 30 m poi',
],
[
                'name' => 'Combattimento con Armi Bianche (Coltelli)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Hunter')->get()[0]->id,
    'description' => 'Abilità che permette di lanciare e maneggiare i coltelli in maniera ottimale',
],
[
                'name' => ' Combattimento corpo a corpo(Wing Chun)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Hunter')->get()[0]->id,
    'description' => 'Abilità di sfruttare tutte le mosse appartenenti all\'arte marziale del Wing Chun',
],
[
                'name' => ' Combattimento con Armi Bianche(Bastoni)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Hunter')->get()[0]->id,
    'description' => 'Abilità che permette di utilizzare in maniera ottimale qualsiasi tipologia di bastone di qualsiasi dimensione',
],
[
                'name' => 'Combattimento con Armi Bianche(Lancia)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Hunter')->get()[0]->id,
    'description' => 'Abilità che permette di utilizzare in maniera ottimale la lancia sfruttandola per qualsiasi genere di evoluzione',
],
[
                'name' => 'Combattimento con Armi da Fuoco(Breve e Media distanza)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Titan')->get()[0]->id,
    'description' => 'Abilità che ottimizza l\'utilizzo di armi che colpiscono al di sotto dei 200 metri',
],
[
                'name' => 'Combattimento con Armi Bianche (Martelli)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Titan')->get()[0]->id,
    'description' => 'Abilità che permette di utilizzare in maniera ottimale qualsiasi genere di arma dalle sembianze di martello',
],
[
                'name' => 'Combattimento corpo a corpo(Prese e Sottomissioni)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Titan')->get()[0]->id,
    'description' => 'Abilità che permette l\'apprendimento di un\'arte marziale che comprende l\'utilizzo di prese e sottomissioni come fulcro dello stile',
],
[
                'name' => 'Combattimento con Armi Bianche(Mazze ed Asce)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Titan')->get()[0]->id,
    'description' => 'Abilità che permette l\'utilizzo di mazze ed asce in combattimento, determinando anche una migliore precisioni nei lanci delle stesse.',
],
[
                'name' => 'Combattimento con Armi da Fuoco(Lanciarazzi)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Titan')->get()[0]->id,
    'description' => 'Abilità che permette di essere abilitati all\'utilizzo dell\'arma ed anche la precisione nel suo utilizzo',
],
[
                'name' => 'Combattimento Armi da Fuoco(Esplosivi)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Warlock')->get()[0]->id,
    'description' => 'Abilità che permette di essere abilitati all\'utilizzo di esplosivi',
],
[
                'name' => 'Combattimento Armi Bianche(Spade Occidentali)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Warlock')->get()[0]->id,
    'description' => 'Abilità che ottimizza l\'utilizzo di qualsiasi genere di spada occidentale',
],
[
                'name' => 'Combattimento corpo a corpo(Kyusho Jitsu)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Warlock')->get()[0]->id,
    'description' => 'Abilità che permette di sfruttare un\'arte marziale che punta ad inibire il corpo dell\'avversario attraverso i punti di pressione',
],
[
                'name' => 'Combattimento con Armi Bianche(Spade Orientale)',
                'id_classe'=>  \App\Classe::select('id')->where('name','Warlock')->get()[0]->id,
    'description' => 'Abilità che permette l\'utilizzo in maniera ottimale di qualsiasi tipologia di spada dal taglio orientale',
],
[
                'name' => 'Combattimento corpo a corpo(Muay Thai) ',
                'id_classe'=>  \App\Classe::select('id')->where('name','Warlock')->get()[0]->id,
    'description' => 'Abilità che permette di sfruttare uno stile di combattimento aggressivo e molto letale',
]

            ]);
            $skills_breed=\App\Skill::insert([            
                [
                    'name' => 'Sensi Sviluppati',
                    'id_breed'=> 2,
        'description' => 'Vista, udito, olfatto e tatto sono più sviluppati rispetto ai sensi di un normale essere umano.',
    ],[
                    'name' => 'Agilità',
                    'id_breed'=> 2,
        'description' => 'Un Awoken ha una capacità di rispondere più velocemente agli input della mente e questo gli permette di avere un\'agilità al di sopra della media.',
    ],[
                    'name' => 'Visione del Piano Ascendente',
                    'id_breed'=> 2,
        'description' => 'Permette di sfruttare la rete dei kaiju per prevederne le mosse, sebbene abbia un costo sul piano fisico se si sfrutta questa abilità per troppo tempo.',
    ],[
                    'name' => 'Canto della Bestia',
                    'id_breed'=> 2 ,
        'description' => 'Permette attraverso un grande sacrificio mentale di possedere un Kaiju con cui si ha contatto visivo. In questo modo il flusso con cui viene comandato dai Precursori viene sostituito dal Canto della Bestia. Più è alta la Categoria del Kaiju, più sarà difficoltoso mantenere un contatto. La quantità dei turni di controllo viene definita dal totale dei punti al di sopra dei 10 di Intelligenza/la categoria del Kaiju.',
    ],[
                    'name' => 'Presa Mentale',
                    'id_breed'=> 2,
        'description' => 'Permette, sfruttando il legame con la rete neurale Kaiju, di bloccare i movimenti del mostro per un numero di turni pari ai punti di Intelligenza superiore a 10',
    ],[
                    'name' => 'Sangue Blu',
                    'id_breed'=> 2 ,
        'description' => 'La mutazione negli Awoken ha avuto una netta influenza anche sul sangue. Quest\'ultimo ha acquisito tutti i tratti tipici che definiscono quello dei Kaiju e se qualcuno dovesse entrare in contatto con il sangue di un Awoken finirà per subire le medesime ferite che avrebbe entrando a contatto con un acido.',
    ],[
                    'name' => 'Campione',
                    'id_breed'=> 2,
        'description' => 'Attraverso questo potere l\'Awoken può attirare su di se l\'attenzione di un kaiju o di un vex catalizzandone su di sè tutti i sensi al fine di sviare la sua attenzione da chi desidera proteggere.',
    ],[
                    'name' => 'Equilibrio',
                    'id_breed'=> 2,
        'description' => 'Questo potere interagisce con i flussi di Chi(Energia) presente in ogni creatura. Il maestro di quest\'arte è in grado di manipolare i flussi energetici del corpo, sia proprio che altrui, bilanciando o producendo uno squilibrio. Non ha ovviamente effetto su creature come spettri e fantasmi. La maggior parte dei poteri ha bisogno del tocco.',
    ],[
                    'name' => 'Liberazione',
                    'id_breed'=> 2,
        'description' => '"Sono stato cresciuto da un\'uomo rigoroso che mi ha insegnato come tirare fuori il meglio dalle situazioni negative." Abilità sfruttata dagli Awoken per riuscire a sfuggire dal Piano Ascendente quando si sta per essere inghiottiti dall\'oscurità. Dopo il suo utilizzo la mente sarà estremamente debilitata e sarà necessario riprendersi prima di poter sfruttare nuovamente le capacità da Awoken.',
    ],[
                    'name' => 'Ascensione',
                    'id_breed'=> 2,
        'description' => 'Abilità che permette di spostare la propria mente in un altro corpo, purchè collegato alla "rete" degli Awoken(Un Awoken rimane collegato alla rete fino a quando il corpo non subisce un totale degrado). L\'abilità può essere usata soltanto se ci si trova in punto di morte. 
    Utilizzo: Si dichiara l\'utilizzo dell\'abilità e si tira un dado da 100 che definisce quanti ricordi si sono persi nel trasferimento. 
    Da 1 a 30 si conservano quasi tutti i ricordi, quelli meno importanti tuttavia sono andati persi.
    Da 31 a 60 si sono persi la gran parte dei ricordi, ma si ricordano le cose più importanti
    Da 61 a 90 la propria storia è, quasi, totalmente persa,ma si riesce ancora a ricordare la propria identità
    Da 91 a 100 si ricorda il proprio nome, tutto il resto purtroppo si è perso per salvarsi la vita',
    ],[
                    'name' => 'Vocazione',
                    'id_breed'=> 1,
        'description' => 'C\'è qualche materia o conoscenza in cui si è maggiormente esperti ed abil',
    ],[
                    'name' => 'Resistenza',
                    'id_breed'=> 1,
        'description' => 'Possiedi una resistenza al di sopra di tutte le altre e questo permette di sopportare maggiormente sforzi e dolore.',
    ],[
                    'name' => 'Forza di Volontà',
                    'id_breed'=> 1,
        'description' => 'Questa caratteristica conferisce un\'incrollabile forza mentale. Lo stress non risulta problematico da sopportare e si riesce a gestirlo perfettamente.',
    ],[
                    'name' => 'Adattabilità',
                    'id_breed'=>1 ,
        'description' => 'La mente, in questo caso, è fatta per adattarsi ad ogni circostanza. Si è così in grado di essere a proprio agio anche in situazioni nuove o inusuali.',
    ],[
                    'name' => 'Volto in Vista',
                    'id_breed'=> 1 ,
        'description' => '"Ah, mai sei proprio tu!", questa è una tipica esclamazione che viene fatta quando si viene visti. Probabilmente si è famosi per qualcosa che si è fatto nel proprio campo ma non solo nel proprio ambiente. Ovunque si vada diverse persone sono in grado di riconoscere il personaggio. Essere famosi è un\'arma a doppio taglio, capire come funziona è a scelta del giocatore.',
    ],[
                    'name' => 'Estremi Rimedi',
                    'id_breed'=> 1,
        'description' => '"Quando vieni attaccato con una Palla da demolizione, costruisci un muro più resistente." Anche nelle situazioni più difficili non hai intenzione di cedere. 
    Utilizzo - Una volta per quest, di fronte ad una situazione difficile, puoi scegliere di analizzare la situazione e questo porterà il narratore ad esporre un modo di risolvere le cose rischioso, ma che porterà a diversi vantaggi.',
    ],[
                    'name' => 'Dominio Territoriale',
                    'id_breed'=> 1,
        'description' => 'Hai totale conoscenza su una tipologia di territorio che finisce per essere per te come una casa quando hai la possibilità di combattervi.',
    ],[
                    'name' => 'Depistaggio',
                    'id_breed'=> 1,
        'description' => 'Siete estremamente abili a creare delle false traccie o degli indizi che portino nella direzione totalmente opposta rispetto a quella corretta.',
    ],[
                    'name' => 'L\'Unione fa la Forza',
                    'id_breed'=> 1,
        'description' => 'Sapete perfettamente che da soli la sconfitta è assicurata, per questo, cercate sempre di riuscire a fare gruppo con gli altri e di spingerli alla collaborazione.',
    ],[
                    'name' => 'Addestrare Animali',
                    'id_breed'=> 1,
        'description' => 'Permette di addestrare qualsiasi tipologia di animale terrestre ai più disparati ordini',
    ],[
                    'name' => 'Memoria Espansa',
                    'id_breed'=> 3,
        'description' => 'La mente di un Exo è in grado di essere accresciuta oltre ais uoi limiti, questo concede una maggiore capacità di calcolo. ',
    ],[
                    'name' => 'Forza Brutale',
                    'id_breed'=>3,
        'description' => ' I propri sistemi permettono di avere una forza fuori dal comune.',
    ],[
                    'name' => 'Sangue Freddo',
                    'id_breed'=> 3,
        'description' => 'Non si perde mai il controllo anche nelle situazioni più disperate.',
    ],[
                    'name' => 'Connessione Remota',
                    'id_breed'=> 3,
        'description' => 'La maestria in questa abilità dipende dal livello di  Intelligenza. Ogni punto superiore al 10 permette un maggiore controllo di qualsiasi oggetto tecnologico purché ci sia stato un contatto entro un\'ora dal momento in cui si sceglie di configurarsi. L\'oggetto deve necessariamente essere connesso alla rete. ',
    ],[
                    'name' => 'Calcolo della Realtà',
                    'id_breed'=> 3 ,
        'description' => 'Grazie al collegamento con la Foresta Infinita, in pochi secondi, l\'Exo è in grado di visualizzare un numero sconfinato di possibili realtà in base ad un\'azione e di determinare la più probabile. Questo permette al possessore dell\'abilità di sapere in anticipo quanto una strategia sarà efficace o meno contro un nemico.',
    ],[
                    'name' => 'Backup',
                    'id_breed'=> 3,
        'description' => 'Coloro che hanno totalmente soppiantato il proprio cervello con uno cibernetico sono in grado di fare salvataggi regolari della memoria in un cloud che impedisce così di esporsi a possibili perdite di dati dovute a shock. Inoltre, questo permette anche di "arretrare" la mente in caso di pensieri che la portano ad entrare in pericolosi circoli negativi.',
    ],[
                    'name' => 'Maschera dei Mille Volti',
                    'id_breed'=> 3,
        'description' => 'Il corpo dell\'exo è stato modificato per poter mostrare un\'immagine caricata nel sistema, questo gli permette di assumere qualsiasi identità modificando la propria immagine. Si tratta di una semplice illusione ottica sia l\'olfatto che il tatto non possono essere ingannati.',
    ],[
                    'name' => 'Resistenza agli EMP',
                    'id_breed'=> 3,
        'description' => 'Modifiche al sistema di isolamento permettono a chi possiede questa capacità di resistere più del normale agli impulsi elettrognametici.',
    ],[
                    'name' => 'Sembianze Umane',
                    'id_breed'=> 3,
        'description' => 'Impianti di pelle sintetica, organi che ricalcano del tutto il funzionamento di quelli umani portano l\'Exo ad apparire in tutto e per tutto con un\'essere umano, c\'è chi non riesce ad abbandonare l\'idea di essere umano e chi invece preferisce potersi mescolare agli esseri viventi non accettando sguardi troppo lunghi, per questo, la scelta di potersi mescolare totalmente agli altri.',
    ],[
                    'name' => 'Code Exo',
                    'id_breed'=>3,
        'description' => 'Abilità che permette di inviare messaggi cifrati a qualsiasi genere di oggetto collegato alla rete, soltanto chi è in possesso del corretto cifrario può decifrarlo.',
    ],
    
                
                ]);
             $skills_hemispere=\App\Skill::insert([            
                [
                    'name' =>'Veglia',
                    'id_hemispere'=>2,
        'description' => 'description',
    ],
    [
                    'name' =>'Compostezza',
                    'id_hemispere'=>2,
        'description' => 'Solitamente sono persone estremamente posate che anche nelle situazioni più disperate riescono a rimanere tranquille',
    ],
    [
                    'name' =>'Autorità',
                    'id_hemispere'=> 2,
        'description' => 'La capacità di analizzare in maniera logica una situazione le porta ad imporsi all\'interno di un gruppo con un innato carisma da leader',
    ],
    [
                    'name' =>'Intuizione',
                    'id_hemispere'=>2,
        'description' => 'Ogni situazione può essere analizzata in maniera schematica e , per questo, è più facile per persone con questa abilità vedere particolari che ad altri sfuggono ',
    ],
    [
                    'name' =>'Auto-appprendimento',
                    'id_hemispere'=> 2,
        'description' => 'Metodo, questa è la parola d\'ordine che porta queste persone a ridurre di un quarto i tempi di apprendimento delle abilità di razza e di una classe.',
    ],
    [
                    'name' =>'Ambidestro',
                    'id_hemispere'=>2,
        'description' => 'Il personaggio è in grado si utilizzare entrambe le mani senza avere alcuna penalità, potendo così ad esempio utilizzare due armi.',
    ],
    [
                    'name' =>'Orologio Biologico',
                    'id_hemispere'=> 2,
        'description' => 'Possedete un innato senso del tempo e siete in grado di quantificarne accuratamente lo scorrere senza bisogno di un orologio o altro attrezzo meccanico.',
    ],
    [
                    'name' =>'Codice d\'Onore',
                    'id_hemispere'=> 2,
        'description' => 'Seguite strettamente un vostro personale codice etico le cui regole verranno stabili dal Narratore prima di giocare. I personaggi con questa abilità non cedono facilmente alla paura quando tentano di evitare situazioni che potrebbero costringerli ad andare contro i propri principi.',
    ],
    [
                    'name' =>'Stella dei Vex',
                    'id_hemispere'=> 2,
        'description' => 'Non si conosce il motivo, ma i Vex sembrano avere una particolare passione per voi. Alcuni vi adorano al punto di difendervi dai loro simili, altri hanno intenzioni meno pacifiche, ma è chiaro che quando venite percepiti all\'interno della loro rete o fuori, la loro attenzione è su di voi.',
    ],
    [
                    'name' =>'Controllo della Ghiandola Pineale',
                    'id_hemispere'=> 2,
        'description' => 'Chi possiede questa peculiarità è i grado di controllare questa particolare ghiandola riuscendo così ad evitare di incorrere in dipendenze. Può controllare l\'apporto ormonale in modo tale da diventare più sensibile ai pericoli o meno in date situazioni.',
    ],
    [
                    'name' =>'Charme',
                    'id_hemispere'=> 1,
        'description' => 'siete in grado di affascinate chi avete intorno con la vostra voce, il vostro modo di porvi. Sapete essere molto convincenti.',
    ],
    [
                    'name' =>'Empatia',
                    'id_hemispere'=> 1,
        'description' => 'Persone sensibili che riescono a percepire le emozioni degli altri anche comprendendone il significato',
    ],
    [
                    'name' =>'Espressività',
                    'id_hemispere'=> 1,
        'description' => 'Tristezza, felicità, divertimento o rabbia. Qualsiasi emozione per queste persone è facile da trasmettere in maniera sempre più precisa e diretta riuscendo, a livelli alti, anche a trasmettere quel particolare stato d\'animo a chi hanno vicino.',
    ],
    [
                    'name' =>'Galateo',
                    'id_hemispere'=> 1,
        'description' => 'Fin da piccole queste persone si distinguono per apprendere con grande facilità l\'etichetta dell\'ambiente in cui crescono, ma anche quelle di nuovi posti dove si ritrovano a spostarsi.',
    ],
    [
                    'name' =>'Equilibrio Felino',
                    'id_hemispere'=> 1,
        'description' => 'L\'equilibrio per loro non ha segreti, camminare sui tetti od in luoghi estremamente pericolosi per loro non è un grande pensiero proprio grazie alla padronanza che hanno sul loro corpo',
    ],
    [
                    'name' =>'Sotterfugio',
                    'id_hemispere'=> 1,
        'description' => 'Non è semplicemente mentire, ma saper mutare la realtà a proprio fare, attraverso la loro creatività sanno come far vedere agli altri ciò che vogliono…sempre che chi hanno di fronte non abbia degli occhi buoni da cogliere le loro menzogne.',
    ],
    [
                    'name' =>'Memoria Fotografica',
                    'id_hemispere'=> 1,
        'description' => 'Conversazioni, immagini, rimangono impresse nella mente, rendendo facile far riaffiorare alla mente foto, documenti et simili.',
    ],
    [
                    'name' =>'Alleato del Mondo Animale',
                    'id_hemispere'=> 1 ,
        'description' => 'Gli animali non vi vedono come una minaccia, anzi, verso di voi sembrano avere una particolare simpatia che li porta a sforzarsi di capirvi',
    ],
    [
                    'name' =>'Inoffensivo',
                    'id_hemispere'=> 1,
        'description' => 'Tutti in città vi conoscono e sanno che non costituite una minaccia. Essere considerati Inoffensivi può sembrare umiliante, ma in verità è quello che vi preserva da situazioni pericolose. Nessuno pensa che valga la pena di trascorrere del tempo con voi, e la scarsa stima di cui godete vi mantiene al sicuro. Se cominciate a comportarvi in modo differente per dimostrare che non siete poi tanto indifesi, la reazione degli altri potrebbe cambiare di conseguenza.',
    ],
    [
                    'name' =>'Santità',
                    'id_hemispere'=> 1,
        'description' => 'Questa peculiarità viene talvolta chiamata "Effetto Aureola": chiunque vi stia intorno vi considera puri e innocenti, anche se non necessariamente ingenui. Avete una certa "santità", difficile da esprimere a parole ma impossibile da negare. La gente si fida di voi, anche se non siete delle persone affidabili. A discrezione del Narratore, riuscite a cavarvela con punizioni inferiori rispetto ai crimini che commettete, e piacete quasi a tutti',
    ]

          ]);
     }
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PopolateDatabase:add_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To popolate the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
          //inserire le razze
          $this->insertBreeds();

          //inserire gli emisferi
          $this->insertHemisperes();

          //inserire le classi
          $this->insertClasses();

          //inserire abilita
          $this->insertSkills();
   
    }
}
