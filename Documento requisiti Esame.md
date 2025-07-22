# Sistema prenotazione libri bibliotecari

1 Overview
Sviluppare un sistema di gestione della biblioteca per automatizzare alcune operazioni bibliotecarie,
ad esempio:
- la gestione del catalogo principale dei libri
- la gestione delle copie del libro con stato
- la prenotazione di una copia di un libro

1.2 Utenti Destinatari
- Admin
Accesso all'area admin per inserimento libri, copie del libro, visualizzazione delle prenotazioni, visualizzazione degli utenti registrati

- Utenti normali o membri
Possono vedere l'elenco dei libri a catalogo e per ciascuno prenotarne una copia

2. Requisiti dell'Architettura del Sistema
Backend e frontend: Framework Laravel con templating Blade o Vue

Database: MySQL

Autenticazione: Sistema di autenticazione integrato in Laravel

3. Requisiti di Progettazione del Database
Entità principali

- Utenti

- Libri: Catalogo principale con metadati (titolo, ISBN, descrizione, categoria, autore)

- Copie dei Libri: Copie fisiche con codice a barre e stato

- Categorie: mini crud per inserimento categorie

- Prenotazioni: Registrazione delle transazioni con tracciamento della posizione

4 Gestione degli utenti
Unica login e registrazione, gli utenti Admin possono essere inseriti a priori nel portale senza una 
registrazione specifica, gli utenti normali invece devono registrarsi e accedere.

5 Backend amministratore

	5.1 Gestione del Catalogo dei Libri

		- Gestione Informazioni Libro
			Metadati Completi: Titolo, ISBN, descrizione, editore, anno di pubblicazione, autore

			Categorie

			Copertine: Caricamento e visualizzazione dell'immagine di copertina

		- Gestione delle Copie
			Campo identificazione univoca: Codice a barre (codice randomico univoco)

			Stato del Libro: Tracciamento delle condizioni (ottimo, buono, discreto)

			Gestione Stato: Disponibile, prenotato

			Note Interne: Note sullo stato o manutenzione

		- Ricerca
			Ricerca testuale: Titolo, autore, ISBN, parola chiave

			Filtri: Categoria, disponibilità, anno pubblicazione

			Paginazione: Gestione efficiente di cataloghi ampi

	5.2 Prenotazioni
		Visualizzazione delle prenotazioni da parte degli utenti con indicazione della posizione.
		
6 	Visualizzazione da parte dell'utente

	6.1 Listato filtrabile dei libri prenotabili
		Per semplicità manteniamo i filtri disponibili a backend (punto 5.1 => ricerca),
		non saranno mostrati eventuali libri con 0 disponibilità
	
	6.2 Dettaglio del libro
		Visualizzazione dei campi principali del libro con prenotazione.
		
		A seconda degli stati delle copie per quel libro e delle disponibilità sarà
		mostrato all'utente la copia ottimale da poter prenotare in quel periodo.
		
		Per semplicità l'azione di prenotazione non scaturisce l'invio di notifiche.