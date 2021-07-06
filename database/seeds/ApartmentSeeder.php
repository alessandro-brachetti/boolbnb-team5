<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      // for ($i=1; $i <= 5; $i++) {
        $apartment = new Apartment();
        $apartment->title = 'Central Loft';
        $apartment->n_rooms = 6;
        $apartment->n_beds = 10;
        $apartment->n_bathrooms = 4;
        $apartment->mq = 250;
        $apartment->address = 'Via Roma 12, Palermo';
        $apartment->latitude = 38.11133;
        $apartment->longitude = 13.36607;
        $apartment->description = 'Ubicato nel centro di Palermo , il nuovissimo Central Loft dista 700 metri dalla Stazione Centrale , e’ a ridosso della Citta’ Vecchia , Castello Svevo, Palazzo Fizzarotti , Lungomare , Via Sparano e Corso Vittorio Emanuele , e’ vicino quindi a tutti i principali luoghi di interesse della citta’ .
        Dispone di una cucina a scomparsa con tutto il necessario , inoltre e’ prevista una macchina da caffe’ Nespresso, bollitore elettrico, frigorifero , tostapane e cassaforte.
        Un apparecchio per l’aromaterapia insieme alla doccia cromoterapica vi accompagnera’ in un piacevole relax .';
        $apartment->img = '/images/appartamenti/app-1.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 1;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'Villa Cala';
        $apartment->n_rooms = 4;
        $apartment->n_beds = 4;
        $apartment->n_bathrooms = 2;
        $apartment->mq = 150;
        $apartment->address = 'Via Cala 10, Palermo';
        $apartment->latitude = 38.11971;
        $apartment->longitude = 13.36918;
        $apartment->description = "La casa si trova al piano superiore di una villa bifamiliare con un suo accesso privato ed una magnifica terrazza a piè di mare. Dispone di 4 camere da letto matrimoniali, un grande soggiorno TV, INTERNET WIFI ed una zona pranzo.Le camere sono disposte in due ali separate della casa CON AC dove vi sono anche i rispettivi bagni con doccia. Vi è inoltre una cucina attrezzata con lavastoviglie che apre anch'essa sulla terrazza vista mare. RIDUZIONI PER LOCAZIONI MENSILI (min 28 notti)";
        $apartment->img = 'images/appartamenti/app-2.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 1;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'Alloggio di lusso con piscina';
        $apartment->n_rooms = 7;
        $apartment->n_beds = 8;
        $apartment->n_bathrooms = 3;
        $apartment->mq = 300;
        $apartment->address = 'Via libertà, Palermo';
        $apartment->latitude = 38.18647;
        $apartment->longitude = 13.24413;
        $apartment->description = "La villa gode di arredi nuovi e confortevoli che sposano i colori della terra, del mare e della vegetazione che la circonda. Comodo divano nella zona soggiorno e cucina spaziosa si aprono sull'area giardino con la possibilità di sfruttare un portico coperto che gode di una vista spettacolare sul mare e nel verde che circonda la villa. Le camere sono spaziose, luminose e con due finestre che garantiscono luce e costante corrente d'aria. La grande terrazza regala un panorama meraviglioso.
                                  Lo spazio
                                  Oltre al divano sono presenti poltrone confort per potersi rilassare. Al primo piano una grande terrazza dove è possibile prendere il sole in totale privacy. Completa il quadro una grande piscina condominiale a poche decine di metri dalla villa.
                                  Accesso per gli ospiti
                                  Gli ospiti della villa, rispettando il regolamento condominiale, hanno il pieno accesso alla piscina durante gli orari di apertura.";
        $apartment->img = 'images/appartamenti/app-3.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 2;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'B&B La porta Accanto';
        $apartment->n_rooms = 3;
        $apartment->n_beds = 4;
        $apartment->n_bathrooms = 2;
        $apartment->mq = 180;
        $apartment->address = 'Via Maqueda, Palermo';
        $apartment->latitude = 38.11554;
        $apartment->longitude = 13.36154;
        $apartment->description = "Tra arte e natura: una casa con l'animaIl B&B La Porta Accanto è realizzato all’interno di un edificio antico, risalente al 1700.E’ una casa molto amata e curata nei minimi dettagli. E’ stata ristrutturata con materiali naturali, l’energia viene fornita tramite l’impianto fotovoltaico e per l’acqua calda ci si serve di una pompa di calore. Il B&B è composto di due camere matrimoniali ognuna delle quali ha uno stile proprio e un bagno privato. La zona giorno è arredata in stile rustico e allietata dal calore di una stube.";
        $apartment->img = 'images/appartamenti/app-4.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 2;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'Casa Leoni';
        $apartment->n_rooms = 3;
        $apartment->n_beds = 3;
        $apartment->n_bathrooms = 1;
        $apartment->mq = 60;
        $apartment->address = 'Piazza Leoni, Palermo';
        $apartment->latitude = 38.14486;
        $apartment->longitude = 13.34632;
        $apartment->description = 'A 150 mt dal mare. In condominio signorile portierato, appartamento di 60 mq sito al terzo piano con ascensore.
                                  Cucina, soggiorno, camera matrimoniale, cameretta con due letti singoli, bagno con doccia, terrazza abitabile vista Alpi Apuane
                                  Aria condizionata, posto auto di proprietà, due biciclette a disposizione.
                                  In dotazione: biancheria, lavatrice, lavastoviglie, tv, asciugacapelli, ferro da stiro
                                  Impianto di riscaldamento autonomo.
                                  Non è dotato di Wi-Fi. Lo si può avere recandosi in portineria.';
        $apartment->img = 'images/appartamenti/app-5.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 1;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'Appartamento nel cuore di Palermo';
        $apartment->n_rooms = 3;
        $apartment->n_beds = 4;
        $apartment->n_bathrooms = 1;
        $apartment->mq = 120;
        $apartment->address = 'Piazza Don Bosco';
        $apartment->latitude = 38.14486;
        $apartment->longitude = 13.34632;
        $apartment->description = "Appartamento situato in un contesto storico e culturale tipico della città antica di Palermo. È sito in posizione centrate rispetto al percorso pedonale Arabo Normanno dichiarato oggi patrimonio mondiale dell'umanità UNESCO.
        Lo spazio
        L'appartamento si trova all'interno della zona pedonale di cui fa parte il percorso arabo normanno del Cassaro, oggi patrimonio mondiale dell'umanità UNESCO. A piedi è possibile raggiungere i luoghi di maggior interesse storico della città. La struttura è stata recentemente ristrutturata con gusto e dotata di tutti i confort.
        Accesso per gli ospiti
        Gli ospiti avranno a disposizione un servizio di lavanderia con lavatrice e asciugatrice, wi fi gratuito, ferro da stiro, lavastoviglie. L'accesso all'immobile è automatizzato e dotato di servizio di sicurezza.";
        $apartment->img = 'images/appartamenti/app-8.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 2;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'Appartamento sul mare, Residence Belhorizonte';
        $apartment->n_rooms = 5;
        $apartment->n_beds = 6;
        $apartment->n_bathrooms = 3;
        $apartment->mq = 220;
        $apartment->address = 'Via Tre Pini, Carini';
        $apartment->latitude = 38.18201;
        $apartment->longitude = 13.15898;
        $apartment->description = "Accogliente e delizioso alloggio in residence di lusso sul mare. La casa può ospitare comodamente quattro persone, con ampio terrazzo da cui si gode la vista del mare. Ideale per una coppia o una famiglia che voglia trascorrere una meravigliosa ed indimenticabile vacanza.
        Lo spazio
        Delizioso e funzionale a piano terra di un bungalow a soli 20 mt dal mare, la casa dispone di un living/cucina con due posti letto, una camera matrimoniale ed un bagno con doccia. Vi si accede da un ampio terrazzo immerso nel verde da cui si gode un'incantevole vista. Perfetto per chiunque voglia godersi cene e pranzi all'aperto o vivere il mare all'insegna di un sano relax.
        Accesso per gli ospiti
        A Marina di Cinisi, in un tratto di costa in cui il mare è particolarmente limpido e cristallino, ci troviamo all'interno di un residence che dispone nella stagione estiva (fine giugno/metà settembre) di adeguate strutture per garantire l'accesso al mare, sdraio ed ombrelloni ad uso comune e numerosi servizi esclusivi ai suoi ospiti: piscina, bar, ristorante, reception/concierge, posto auto. Negli altri periodi il bungalow è sempre disponibile ma senza i servizi suddetti.
        Altre cose da tenere a mente
        Si consiglia di affittare l'automobile.
        Non disponibile per il mese di Agosto.";
        $apartment->img = 'images/appartamenti/app-7.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 2;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'Accogliente Chalet di montagna';
        $apartment->n_rooms = 4;
        $apartment->n_beds = 2;
        $apartment->n_bathrooms = 1;
        $apartment->mq = 90;
        $apartment->address = 'Via Alberto De Agostini, Palermo';
        $apartment->latitude = 38.19095;
        $apartment->longitude = 13.34125;
        $apartment->description = "La villa è un'oasi di pace nella tranquillità e frescura della montagna. Si trova in provincia di Palermo 10 km dall aeroporto e 20 km da Palermo. Posizione strategica per visitare tutta la Sicilia occidentale Palermo Marsala Selinunte Siracura San Vito lo Capo ecc. Potrete scegliere tra tantissimi posti di mare tra i più belli della Sicilia occidentale tutte spiagge di sabbia bianca e mare cristallino, e alla fine della giornata tornare nel silenzio per rigenerarvi.
                                  Lo spazio
                                  Nella villa avrete a disposizione 2000 metri quadri di giardino, sdraio per prendere il sole, doccia esterna con acqua calda per rinfrescarvi, un favoloso gazebo con tavolo sedie, fuochi per cucinare e barbeque per fare la brace e per mangiare fuori soli o con amici. Potrete stendervi nel morbido prato e abbronzarvi senza sentire caldo grazie alla temperatura sempre mite
                                  visto che la villa si trova a 650 metri di altezza. Vedrete dei tramonti sul mare tra i più belli, i profumi, i suoni e i colori di questo luogo magico vi rimarranno per sempre
                                  impressi.
                                  Accesso per gli ospiti
                                  avete tutta la villa indipendente per voi";
        $apartment->img = 'images/appartamenti/app-10.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 1;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'Industrial countryside Villa';
        $apartment->n_rooms = 8;
        $apartment->n_beds = 6;
        $apartment->n_bathrooms = 4;
        $apartment->mq = 300;
        $apartment->address = 'Via Tolomea, Palermo';
        $apartment->latitude = 38.20699;
        $apartment->longitude = 13.31869;
        $apartment->description = "Appartamento in una tipica fattoria Siciliana a 5 minuti dal mare a 10 dall' aereoporto Falcone-Borsellino, 15 dalla città di Palermo, 30 da Segesta, dalla Riserva dello Zingaro e da Scopello. Luogo di relax, mare, natura.
                                  Le giornate sono scandite dalle attività collegate alla campagna come la raccolta delle carrube, degli agrumi, delle olive , dei fichi d'india e sarà un nostro piacere potere mostrare ai nostri ospiti la nostra azienda e la vita contadina a due passi dal mare.
                                  Lo spazio
                                  Grazie per avere visitato il mio annuncio. L'appartamento si trova all'interno di un'antica tenuta Siciliana in una splendida campagna ricca di alberi di ulivo, limoni, aranci, carrubi e fichidindia, con vista sul mare. Lo spazio è così suddiviso: ampio living room e cucina in muratura, una zona notte con letto matrimoniale, letto singolo e culla, bagno con doccia. Se siete 2 coppie possiamo ospitare una delle due in un' altra camera aggiuntiva, con ingresso indipendente, con due posti letto e una piccola toilette con wc e lavabo. Specifichiamo che la doccia è una sola ed è nell' appartamento principale.
                                  Il posto è ideale per famiglie e coppie.";
        $apartment->img = 'images/appartamenti/app-12.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 2;
        $apartment->save();

        $apartment = new Apartment();
        $apartment->title = 'Appartamento modern style in palazzo antico';
        $apartment->n_rooms = 5;
        $apartment->n_beds = 3;
        $apartment->n_bathrooms = 3;
        $apartment->mq = 200;
        $apartment->address = 'Via Ruggero Settimo, Palermo';
        $apartment->latitude = 38.12275;
        $apartment->longitude = 13.35683;
        $apartment->description = "L'appartamento si trova all’interno di un antico palazzo nobiliare del ‘700, nel cuore del centro storico di Palermo, a pochissimi passi dalle maggiori attrazioni culturali (teatro Massimo, chiesa della Martorana).L’appartamento, totalmente ristrutturato ha due livelli in cui vi sono tre camere da letto climatizzate;due bagni, uno con vasca idromassaggio e uno con doccia; una cucina e una zona living con balconi. L’appartamento è inoltre dotato di WI-FI e riscaldamento autonomo.";
        $apartment->img = 'images/appartamenti/app-13.jpeg';
        $apartment->visible = 1;
        $apartment->user_id = 2;
        $apartment->save();
      // }
    }
}
