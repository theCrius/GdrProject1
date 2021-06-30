# Struttura del progetto
si divide in
* Classes 
  * Ogni classe prevede dei traits utili a diverse azioni

## Chat
equivale a tutte le mappe e si divide in 
* Topchat --> la mappa principale o eventuali mappe principali
* Middlechat --> le mappe a cui arriviamo per mezzo delle Topchat
* Bottomchat --> le mappe  che sono legate a eventuali middlechat

## Subchat 
sono le chat in cui i player si incontrano per scrivere azioni, sono legabili ad ogni tipo di chat

## Tools
Inanzitutto il sito si pone 3 modal
* Modal Esterne --> quando non si è loggati
* Modal Interne ( scheda pg ) --> che sono state sviluppate prima di studiare vuejs
* Modal vuejs --> tutte le sezioni tranne la scheda pg , sviluppate in vuejs e quindi più recenti

### Presenti
Sfruttano la cache interna di laravel ( quindi su un file ) e quando si logga e si esce cancella l'utente d quel file, oppure ogni qualvolta qualcuno entra ed esce si ricontrollano le date affinche non sia scaduto qualche utente e viene automaticamente cancellato. Il tutto collegato con websocket a vuejs che nel momento in cui avviene un evento ( UsersOnline ) allora manda i nuovi utenti online