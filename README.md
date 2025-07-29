Ho pensato di gestire tutta la logica del sito in questo modo:

- 1) funzioni UTENTE NORMALE e confronto con ADMIN:
    - 1.1 il catalogo dei libri (titoli) mostra: 
        - 1.1.1 per gli ADMIN mostra tutti i libri e i dati titolo, autore, isbn, descrizione e pubblicazione, con il bottone per vederne i dettagli;
        - 1.1.2 per gli UTENTI NORMALI mostra solo i libri di cui c'è almeno una copia disponibile, oltre a tutte le stesse informazioni mostrate agli admin e in più c'è il bottone 'prenota copia', con cui si viene reindirizzati alla pagina per effettuare la prenotazione, in cui (in caso di presenza di più copie) automaticamente ci verrà proposta la copia con una condizione migliore.
    - 1.2 il cataogo delle copie :
        - 1.2.1 per gli ADMIN è accessibile attraverso la ricerca (testuale o per filtri [in cui è possibile filtrare per categoria, anno e disponibilità]) e mostra tutte le copie presenti in archivio, colorando i bordi di verde o rosso a seconda della disponibilità o meno di un libro e mostra inoltre, per i libri prenotati, nome e mail dell'utente che lo ha prenotato e quando lo ha prenotato (data e ora)
        - 1.2.2 per gli UTENTI NORMALI il catalogo copie mostra solo le copie disponibili e permette di selezionare una specifica copia da prenotare, cliccando sull'apposito bottone si viene reindirizzati alla pagina di conferma della prenotazione della copia selezionata (e non generata automaticamente come prima)

- 2) logica e funzioni ADMIN
    - 2.1 Aggiungi libro - Da la possibilità di aggiungere un nuovo titolo e caricare l'immagine di copertina di questo, nel caso in cui l'immagine non venga caricata ne verrà inserita una di default;
    - 2.2 Carica copie - Da qui sara possibile aggiungere una copia di uno dei libri presenti già nel catalogo, verrà fornito automaticamente un codice a barre non modificabile e sarà possibile indicare la condizione del libro e delle evenutali note da aggiungere in merito alla copia;
    - 2.3 Catalogo - Come già detto mostra tutti i titoli presenti nel catalogo;
    - 2.4 Prenotazioni - Mostra una tabella contente l'elenco di tutte le copie attualmente prenotate e per ogni copia viene specificato titolo, utente in possesso della copia, data e ora in cui la copia è stata prenotata, stato del libro, codice a barra della copia e le eventuali note
    - 2.5 Utenti - Mostra una tabella in cui è possibile visualizzare tutti gli UTENTI NORMALI registrati nel portale e per ognuno di loro è possibile viusualizzare id, nome, email e copie prenotate
    - 2.6 Gestione categorie - Qui è possibile visualizzare tutte le categorie presenti nella piattaforma e gestirle, modificandone il nome, eleminandole o aggiungendone di nuove.
    - 2.7 Ricerca - i risultati dellaricerca sono organizzati in 4 card per pagina, per rendere l'esperienza dell'utente più comoda.
        - 2.7.1 Ricerca testuale - Digitando una parola, si ha modo di cercare tra le copie fra titolo, autore, isbn o descrizione, i risultati sono delle card di cui ho parlato nei punti 1.1 e 1.2
        - 2.7.2 Ricerca per filtri - E' possibile cercare una copia specifica filtrando per anno, categoria e disponibilità (i filtri si intersecano, quindi è possibile cercare una copia di uno specifico anno (che si può scegliere tra i vari anni di publicazione dei titoli in catalogo, quindi se non c'è nessun libro publicato nel 1999 l'anno 1999 non sarà tra le possibilità),di nua specifica categoria che sia disponibile)
    
- 3) Seeder - Ho creato, con lo scopo di testare la piattaforma, diversi seeder:
    - 3.1 - Singoli seeder:
        - 3.1.1 - AdminSeeder - Crea un utente admin con mail admin@admin.com e password 'password'
        - 3.1.2 - UserSeeder - Crea 3 utenti con mail mariorossi@mail.com, giovannibianchi@mail.com e lucaverdi@mail.com, tutti e 3 con password 'password'
        - 3.1.3 - CategorySeeder - Crea 12 categorie
        - 3.1.4 - BookSeeder - Crea 10 libri, registrando 2 copie totali per ogni libro e collegando ogni libro ad una categoria
        - 3.1.5 - CopySeeder - Crea 20 copie, 2 per ogni libro in cui una è prenotata e l'altra è disponibile. Allo stesso tempo per ogni copia prenotata crea anche una prenotazione collegata randomicamente ad uno dei 3 utenti generati dal UserSeeder
    - 3.2 - DatabaseSeeder - Contiene il comando per lanciare tutti i singoli seeder nel corretto ordine che garantisca il corretto funzionamento della piattaforma (ovvero: AminSeeder, UserSeeder, CategorySeeder, BookSeeder, CopySeeder)

    - 4) Istruzione per il corretto avvio del progetto:
    - 4.1 - clonare il progetto in locale: 'git clone https://github.com/GianvitoLovecchio/testBiblioteca'
    - entrare nella cartella del progetto: 'cd testBiblioteca'
    - 4.2 creare un db in locale chiamato 'laravel'
    - 4.3 copiare il file di configurazione .env.example in .env: 'cp .env.example .env'
    - 4.4 impostare la parte del .env in questo modo: 
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME= (username personale)
        DB_PASSWORD= (password personale)
    - 4.5 installare le dipendenze js: 'npm install'
    - 4.6 installare le dipendenze php: 'composer i'
    - 4.7 generare la chiave di encriptazione: 'php artisan key:gen' 
    - 4.8 creare il link alla cartella storage 'php artisan storage:link'
    - 4.9 lanciare la migrazione per la greazione delle tabelle: 'php artisan migrate'
    - 4.10 lanciare i seed: 'php artisan db:seed'
    - 4.11 avviare vite: 'npm run dev'
    - 4.12 lanciare il server locale di php: 'php artisan serve'