<?php
/**
 * Text used for 'Entities' (Document Structure Elements) such as
 * Books, Shelves, Chapters & Pages
 */
return [

    // Shared
    'recently_created' => 'Creati di recente',
    'recently_created_pages' => 'Pagine create di recente',
    'recently_updated_pages' => 'Pagine aggiornate di recente',
    'recently_created_chapters' => 'Capitoli creati di recente',
    'recently_created_books' => 'Libri creati di recente',
    'recently_created_shelves' => 'Librerie Create Di Recente',
    'recently_update' => 'Aggiornati di recente',
    'recently_viewed' => 'Visti di recente',
    'recent_activity' => 'Attività Recente',
    'create_now' => 'Creane uno ora',
    'revisions' => 'Versioni',
    'meta_revision' => 'Versione #:revisionCount',
    'meta_created' => 'Creato :timeLength',
    'meta_created_name' => 'Creato :timeLength da :user',
    'meta_updated' => 'Aggiornato :timeLength',
    'meta_updated_name' => 'Aggiornato :timeLength da :user',
    'meta_owned_name' => 'Creati da :user',
    'meta_reference_page_count' => 'Referenziato su :count page|Referenziato su :count pages',
    'entity_select' => 'Selezione Entità',
    'entity_select_lack_permission' => 'Non hai i permessi necessari per selezionare questo elemento',
    'images' => 'Immagini',
    'my_recent_drafts' => 'Bozze Recenti',
    'my_recently_viewed' => 'Visti di recente',
    'my_most_viewed_favourites' => 'I Miei Preferiti Più Visti',
    'my_favourites' => 'I miei Preferiti',
    'no_pages_viewed' => 'Non hai visto nessuna pagina',
    'no_pages_recently_created' => 'Nessuna pagina è stata creata di recente',
    'no_pages_recently_updated' => 'Nessuna pagina è stata aggiornata di recente',
    'export' => 'Esporta',
    'export_html' => 'File Contenuto Web',
    'export_pdf' => 'File PDF',
    'export_text' => 'File di testo',
    'export_md' => 'File Markdown',

    // Permissions and restrictions
    'permissions' => 'Permessi',
    'permissions_desc' => 'Imposta qui i permessi per sovrascrivere i permessi predefiniti forniti dai ruoli utente.',
    'permissions_book_cascade' => 'I permessi impostati sui libri si trasmettono automaticamente a cascata ai capitoli e alle pagine figli, a meno che non siano stati definiti permessi propri.',
    'permissions_chapter_cascade' => 'I permessi impostati sui capitoli si trasmettono automaticamente a cascata alle pagine figlie, a meno che non siano stati definiti permessi propri.',
    'permissions_save' => 'Salva Permessi',
    'permissions_owner' => 'Proprietario',
    'permissions_role_everyone_else' => 'Tutti Gli Altri',
    'permissions_role_everyone_else_desc' => 'Imposta i permessi per tutti i ruoli non specificamente sovrascritti.',
    'permissions_role_override' => 'Sovrascrivere i permessi per il ruolo',
    'permissions_inherit_defaults' => 'Eredita predefinite',

    // Search
    'search_results' => 'Risultati Ricerca',
    'search_total_results_found' => ':count risultato trovato|:count risultati trovati',
    'search_clear' => 'Pulisci Ricerca',
    'search_no_pages' => 'Nessuna pagina corrisponde alla ricerca',
    'search_for_term' => 'Ricerca per :term',
    'search_more' => 'Più Risultati',
    'search_advanced' => 'Ricerca Avanzata',
    'search_terms' => 'Termini Ricerca',
    'search_content_type' => 'Tipo di Contenuto',
    'search_exact_matches' => 'Corrispondenza Esatta',
    'search_tags' => 'Ricerche Tag',
    'search_options' => 'Opzioni',
    'search_viewed_by_me' => 'Visti',
    'search_not_viewed_by_me' => 'Non visti',
    'search_permissions_set' => 'Permessi impostati',
    'search_created_by_me' => 'Creati da me',
    'search_updated_by_me' => 'Aggiornati da me',
    'search_owned_by_me' => 'Creati da me',
    'search_date_options' => 'Opzioni Data',
    'search_updated_before' => 'Aggiornati prima del',
    'search_updated_after' => 'Aggiornati dopo il',
    'search_created_before' => 'Creati prima del',
    'search_created_after' => 'Creati dopo il',
    'search_set_date' => 'Imposta Data',
    'search_update' => 'Aggiorna Ricerca',

    // Shelves
    'shelf' => 'Libreria',
    'shelves' => 'Librerie',
    'x_shelves' => ':count Libreria|:count Librerie',
    'shelves_empty' => 'Nessuna libreria è stata creata',
    'shelves_create' => 'Crea Nuova Libreria',
    'shelves_popular' => 'Librerie Popolari',
    'shelves_new' => 'Nuove Librerie',
    'shelves_new_action' => 'Nuova Libreria',
    'shelves_popular_empty' => 'Le librerie più popolari appariranno qui.',
    'shelves_new_empty' => 'Le librerie create più di recente appariranno qui.',
    'shelves_save' => 'Salva Libreria',
    'shelves_books' => 'Libri in questa libreria',
    'shelves_add_books' => 'Aggiungi libri a questa libreria',
    'shelves_drag_books' => 'Trascina i libri qui sotto per aggiungerli a questa libreria',
    'shelves_empty_contents' => 'Questa libreria non ha libri assegnati',
    'shelves_edit_and_assign' => 'Modifica la libreria per assegnare i libri',
    'shelves_edit_named' => 'Modifica Libreria :name',
    'shelves_edit' => 'Modifica Libreria',
    'shelves_delete' => 'Elimina Libreria',
    'shelves_delete_named' => 'Elimina Libreria :name',
    'shelves_delete_explain' => "La libreria ':name' verrà eliminata. I libri al suo interno non verranno eliminati.",
    'shelves_delete_confirmation' => 'Sei sicuro di voler eliminare questa libreria?',
    'shelves_permissions' => 'Permessi Libreria',
    'shelves_permissions_updated' => 'Permessi Libreria Aggiornati',
    'shelves_permissions_active' => 'Permessi Libreria Attivi',
    'shelves_permissions_cascade_warning' => 'I permessi delle librerie non si estendono automaticamente ai libri contenuti. Questo perché un libro può essere presente su più scaffali. I permessi possono comunque essere copiati ai libri al suo interno usando l\'opzione sottostante.',
    'shelves_permissions_create' => 'Le autorizzazioni per la creazione di librerie sono utilizzate solo per copiare le autorizzazioni ai libri figli utilizzando l\'azione sottostante. Non controllano la capacità di creare libri.',
    'shelves_copy_permissions_to_books' => 'Copia Permessi ai Libri',
    'shelves_copy_permissions' => 'Copia Permessi',
    'shelves_copy_permissions_explain' => 'Verranno applicati tutti i permessi della libreria ai libri al suo interno. Prima dell\'attivazione, assicurati che ogni permesso di questa libreria sia salvato.',
    'shelves_copy_permission_success' => 'Permessi della libreria copiati in :count libri',

    // Books
    'book' => 'Libro',
    'books' => 'Libri',
    'x_books' => ':count Libro|:count Libri',
    'books_empty' => 'Nessun libro è stato creato',
    'books_popular' => 'Libri Popolari',
    'books_recent' => 'Libri Recenti',
    'books_new' => 'Nuovi Libri',
    'books_new_action' => 'Nuovo Libro',
    'books_popular_empty' => 'I libri più popolari appariranno qui.',
    'books_new_empty' => 'I libri creati più di recente appariranno qui.',
    'books_create' => 'Crea Nuovo Libro',
    'books_delete' => 'Elimina Libro',
    'books_delete_named' => 'Elimina il libro :bookName',
    'books_delete_explain' => 'Questo eliminerà il libro di nome \':bookName\'. Tutte le pagine e i capitoli saranno rimossi.',
    'books_delete_confirmation' => 'Sei sicuro di voler eliminare questo libro?',
    'books_edit' => 'Modifica Libro',
    'books_edit_named' => 'Modifica il libro :bookName',
    'books_form_book_name' => 'Nome Libro',
    'books_save' => 'Salva Libro',
    'books_permissions' => 'Permessi Libro',
    'books_permissions_updated' => 'Permessi del libro aggiornati',
    'books_empty_contents' => 'Non ci sono pagine o capitoli per questo libro.',
    'books_empty_create_page' => 'Crea una nuova pagina',
    'books_empty_sort_current_book' => 'Ordina il libro corrente',
    'books_empty_add_chapter' => 'Aggiungi un capitolo',
    'books_permissions_active' => 'Permessi libro attivi',
    'books_search_this' => 'Cerca in questo libro',
    'books_navigation' => 'Navigazione Libro',
    'books_sort' => 'Ordina il contenuto del libro',
    'books_sort_desc' => 'Spostare capitoli e pagine all\'interno di un libro per riorganizzarne il contenuto. È possibile aggiungere altri libri, per spostare facilmente capitoli e pagine da un libro all\'altro.',
    'books_sort_named' => 'Ordina il libro :bookName',
    'books_sort_name' => 'Ordina per Nome',
    'books_sort_created' => 'Ordina per Data di Creazione',
    'books_sort_updated' => 'Ordina per Data di Aggiornamento',
    'books_sort_chapters_first' => 'Capitoli Per Primi',
    'books_sort_chapters_last' => 'Capitoli Per Ultimi',
    'books_sort_show_other' => 'Mostra Altri Libri',
    'books_sort_save' => 'Salva il nuovo ordine',
    'books_sort_show_other_desc' => 'Aggiungere qui altri libri per includerli nell\'operazione di ordinamento e consentire una facile riorganizzazione incrociata dei libri.',
    'books_sort_move_up' => 'Muovi su',
    'books_sort_move_down' => 'Muovi giù',
    'books_sort_move_prev_book' => 'Passare al libro precedente',
    'books_sort_move_next_book' => 'Passare al libro successivo',
    'books_sort_move_prev_chapter' => 'Passare al capitolo precedente',
    'books_sort_move_next_chapter' => 'Passare al capitolo successivo',
    'books_sort_move_book_start' => 'Spostarsi all\'inizio del libro',
    'books_sort_move_book_end' => 'Spostarsi alla fine del libro',
    'books_sort_move_before_chapter' => 'Passare al capitolo precedente',
    'books_sort_move_after_chapter' => 'Passare al capitolo successivo',
    'books_copy' => 'Copia Libro',
    'books_copy_success' => 'Libro copiato con successo',

    // Chapters
    'chapter' => 'Capitolo',
    'chapters' => 'Capitoli',
    'x_chapters' => ':count Capitolo|:count Capitoli',
    'chapters_popular' => 'Capitoli Popolari',
    'chapters_new' => 'Nuovo Capitolo',
    'chapters_create' => 'Crea un nuovo capitolo',
    'chapters_delete' => 'Elimina Capitolo',
    'chapters_delete_named' => 'Elimina il capitolo :chapterName',
    'chapters_delete_explain' => 'Procedendo si eliminerà il capitolo denominato \':chapterName\'. Anche le pagine in esso contenute saranno eliminate.',
    'chapters_delete_confirm' => 'Sei sicuro di voler eliminare questo capitolo?',
    'chapters_edit' => 'Elimina Capitolo',
    'chapters_edit_named' => 'Modifica il capitolo :chapterName',
    'chapters_save' => 'Salva Capitolo',
    'chapters_move' => 'Muovi Capitolo',
    'chapters_move_named' => 'Muovi il capitolo :chapterName',
    'chapters_copy' => 'Copia Capitolo',
    'chapters_copy_success' => 'Capitolo copiato con successo',
    'chapters_permissions' => 'Permessi Capitolo',
    'chapters_empty' => 'Non ci sono pagine in questo capitolo.',
    'chapters_permissions_active' => 'Permessi Capitolo Attivi',
    'chapters_permissions_success' => 'Permessi Capitolo Aggiornati',
    'chapters_search_this' => 'Cerca in questo capitolo',
    'chapter_sort_book' => 'Ordina Libro',

    // Pages
    'page' => 'Pagina',
    'pages' => 'Pagine',
    'x_pages' => ':count Pagina|:count Pagine',
    'pages_popular' => 'Pagine Popolari',
    'pages_new' => 'Nuova Pagina',
    'pages_attachments' => 'Allegati',
    'pages_navigation' => 'Navigazione Pagine',
    'pages_delete' => 'Elimina Pagina',
    'pages_delete_named' => 'Elimina la pagina :pageName',
    'pages_delete_draft_named' => 'Elimina bozza della pagina :pageName',
    'pages_delete_draft' => 'Elimina Bozza Pagina',
    'pages_delete_success' => 'Pagina eliminata',
    'pages_delete_draft_success' => 'Bozza di una pagina eliminata',
    'pages_delete_confirm' => 'Sei sicuro di voler eliminare questa pagina?',
    'pages_delete_draft_confirm' => 'Sei sicuro di voler eliminare la bozza di questa pagina?',
    'pages_editing_named' => 'Modifica :pageName',
    'pages_edit_draft_options' => 'Opzioni Bozza',
    'pages_edit_save_draft' => 'Salva Bozza',
    'pages_edit_draft' => 'Modifica Bozza della pagina',
    'pages_editing_draft' => 'Modifica Bozza',
    'pages_editing_page' => 'Modifica Pagina',
    'pages_edit_draft_save_at' => 'Bozza salvata alle ',
    'pages_edit_delete_draft' => 'Elimina Bozza',
    'pages_edit_delete_draft_confirm' => 'Si è sicuri di voler eliminare le modifiche alla pagina bozza? Tutte le modifiche apportate dall\'ultimo salvataggio completo andranno perse e l\'editor verrà aggiornato con l\'ultimo stato di salvataggio della pagina non in bozza.',
    'pages_edit_discard_draft' => 'Scarta Bozza',
    'pages_edit_switch_to_markdown' => 'Passa all\'editor Markdown',
    'pages_edit_switch_to_markdown_clean' => '(Contenuto Chiaro)',
    'pages_edit_switch_to_markdown_stable' => '(Contenuto Stabile)',
    'pages_edit_switch_to_wysiwyg' => 'Passa all\'editor WYSIWYG',
    'pages_edit_set_changelog' => 'Imposta Changelog',
    'pages_edit_enter_changelog_desc' => 'Inserisci una breve descrizione dei cambiamenti che hai apportato',
    'pages_edit_enter_changelog' => 'Inserisci Changelog',
    'pages_editor_switch_title' => 'Cambia Editor',
    'pages_editor_switch_are_you_sure' => 'Sei sicuro di voler cambiare l\'editor di questa pagina?',
    'pages_editor_switch_consider_following' => 'Considerare quanto segue quando si cambia editor:',
    'pages_editor_switch_consideration_a' => 'Una volta salvata, la nuova opzione di editor sarà utilizzata da qualsiasi editor futuro, inclusi quelli che potrebbero non essere in grado di cambiare il tipo di editor da solo.',
    'pages_editor_switch_consideration_b' => 'Ciò può potenzialmente portare a una perdita di dettagli e sintassi in determinate circostanze.',
    'pages_editor_switch_consideration_c' => 'Le modifiche al tag o al changelog, fatte dall\'ultimo salvataggio, non persisteranno in questa modifica.',
    'pages_save' => 'Salva Pagina',
    'pages_title' => 'Titolo Pagina',
    'pages_name' => 'Nome Pagina',
    'pages_md_editor' => 'Editor',
    'pages_md_preview' => 'Anteprima',
    'pages_md_insert_image' => 'Inserisci Immagina',
    'pages_md_insert_link' => 'Inserisci Link Entità',
    'pages_md_insert_drawing' => 'Inserisci Disegno',
    'pages_md_show_preview' => 'Visualizza anteprima',
    'pages_md_sync_scroll' => 'Sincronizza scorrimento anteprima',
    'pages_drawing_unsaved' => 'Trovato Disegno Non Salvato',
    'pages_drawing_unsaved_confirm' => 'Sono stati trovati i dati di un disegno non salvati da un precedente tentativo di salvataggio di disegno non riuscito. Ripristinare e continuare a modificare questo disegno non salvato?',
    'pages_not_in_chapter' => 'La pagina non è in un capitolo',
    'pages_move' => 'Muovi Pagina',
    'pages_copy' => 'Copia Pagina',
    'pages_copy_desination' => 'Copia Destinazione',
    'pages_copy_success' => 'Pagina copiata correttamente',
    'pages_permissions' => 'Permessi Pagina',
    'pages_permissions_success' => 'Permessi pagina aggiornati',
    'pages_revision' => 'Versione',
    'pages_revisions' => 'Versioni Pagina',
    'pages_revisions_desc' => 'Di seguito sono elencate tutte le revisioni precedenti di questa pagina. È possibile consultare, confrontare e ripristinare le vecchie versioni della pagina, se le autorizzazioni lo consentono. La cronologia completa della pagina potrebbe non essere riportata qui, poiché, a seconda della configurazione del sistema, le vecchie revisioni potrebbero essere cancellate automaticamente.',
    'pages_revisions_named' => 'Versioni della pagina :pageName',
    'pages_revision_named' => 'Versione della pagina :pageName',
    'pages_revision_restored_from' => 'Ripristinato da #:id; :summary',
    'pages_revisions_created_by' => 'Creata Da',
    'pages_revisions_date' => 'Data Versione',
    'pages_revisions_number' => '#',
    'pages_revisions_sort_number' => 'Numero Revisione',
    'pages_revisions_numbered' => 'Revisione #:id',
    'pages_revisions_numbered_changes' => 'Modifiche Revisione #:id',
    'pages_revisions_editor' => 'Tipo Di Editor',
    'pages_revisions_changelog' => 'Cambiamenti',
    'pages_revisions_changes' => 'Cambiamenti',
    'pages_revisions_current' => 'Versione Corrente',
    'pages_revisions_preview' => 'Anteprima',
    'pages_revisions_restore' => 'Ripristina',
    'pages_revisions_none' => 'Questa pagina non ha versioni',
    'pages_copy_link' => 'Copia Link',
    'pages_edit_content_link' => 'Vai alla sezione nell\'editor',
    'pages_pointer_enter_mode' => 'Accedi alla modalità di selezione della sezione',
    'pages_pointer_label' => 'Opzioni Sezione Pagina',
    'pages_pointer_permalink' => 'Permalink Sezione Pagina',
    'pages_pointer_include_tag' => 'Sezione Pagina Includi Tag',
    'pages_pointer_toggle_link' => 'Modalità Permalink, Premi per mostrare il tag includi',
    'pages_pointer_toggle_include' => 'Modo includi tag, premi per mostrare permalink',
    'pages_permissions_active' => 'Permessi Pagina Attivi',
    'pages_initial_revision' => 'Pubblicazione iniziale',
    'pages_references_update_revision' => 'Aggiornamento automatico di sistema dei collegamenti interni',
    'pages_initial_name' => 'Nuova Pagina',
    'pages_editing_draft_notification' => 'Stai modificando una bozza che è stata salvata il :timeDiff.',
    'pages_draft_edited_notification' => 'Questa pagina è stata aggiornata. È consigliabile scartare questa bozza.',
    'pages_draft_page_changed_since_creation' => 'Questa pagina è stata aggiornata da quando è stata creata questa bozza. Si consiglia di scartare questa bozza o fare attenzione a non sovrascrivere alcun cambiamento di pagina.',
    'pages_draft_edit_active' => [
        'start_a' => ':count hanno iniziato a modificare questa pagina',
        'start_b' => ':userName ha iniziato a modificare questa pagina',
        'time_a' => 'da quando le pagine sono state aggiornate',
        'time_b' => 'negli ultimi :minCount minuti',
        'message' => ':start :time. Assicurati di non sovrascrivere le modifiche degli altri!',
    ],
    'pages_draft_discarded' => 'Bozza scartata! L\'editor è stato aggiornato con il contenuto della pagina corrente',
    'pages_draft_deleted' => 'Bozza eliminata! L\'editor è stato aggiornato con il contenuto della pagina corrente',
    'pages_specific' => 'Pagina Specifica',
    'pages_is_template' => 'Template Pagina',

    // Editor Sidebar
    'toggle_sidebar' => 'Attiva/Disattiva Barra Laterale',
    'page_tags' => 'Tag Pagina',
    'chapter_tags' => 'Tag Capitolo',
    'book_tags' => 'Tag Libro',
    'shelf_tags' => 'Tag Libreria',
    'tag' => 'Tag',
    'tags' =>  'Tag',
    'tags_index_desc' => 'I tag possono essere applicati ai contenuti del sistema per applicare una forma flessibile di categorizzazione. I tag possono avere contemporaneamente una chiave e un valore, mentre il valore è opzionale. Una volta applicati, i contenuti possono essere interrogati utilizzando il nome e il valore del tag.',
    'tag_name' =>  'Nome Tag',
    'tag_value' => 'Valore (Opzionale)',
    'tags_explain' => "Aggiungi tag per categorizzare meglio il contenuto. \n Puoi assegnare un valore ai tag per una migliore organizzazione.",
    'tags_add' => 'Aggiungi un altro tag',
    'tags_remove' => 'Rimuovi questo tag',
    'tags_usages' => 'Utilizzo totale dei tag',
    'tags_assigned_pages' => 'Assegnato alle Pagine',
    'tags_assigned_chapters' => 'Assegnato ai capitoli',
    'tags_assigned_books' => 'Assegnato a Libri',
    'tags_assigned_shelves' => 'Assegnato alle Librerie',
    'tags_x_unique_values' => ':count valori univoci',
    'tags_all_values' => 'Tutti i valori',
    'tags_view_tags' => 'Visualizza tag',
    'tags_view_existing_tags' => 'Usa i tag esistenti',
    'tags_list_empty_hint' => 'I tag possono essere assegnati tramite la barra laterale dell\'editor di pagina o durante la modifica dei dettagli di un libro, capitolo o libreria.',
    'attachments' => 'Allegati',
    'attachments_explain' => 'Carica alcuni file o allega link per visualizzarli nella pagina. Questi sono visibili nella sidebar della pagina.',
    'attachments_explain_instant_save' => 'I cambiamenti qui sono salvati istantaneamente.',
    'attachments_upload' => 'Carica File',
    'attachments_link' => 'Allega Link',
    'attachments_upload_drop' => 'In alternativa puoi trascinare un file qui per caricarlo come allegato.',
    'attachments_set_link' => 'Imposta Link',
    'attachments_delete' => 'Sei sicuro di voler eliminare questo allegato?',
    'attachments_dropzone' => 'Trascina qui i file da caricare',
    'attachments_no_files' => 'Nessun file è stato caricato',
    'attachments_explain_link' => 'Puoi allegare un link se preferisci non caricare un file. Questo può essere un link a un\'altra pagina o a un file nel cloud.',
    'attachments_link_name' => 'Nome Link',
    'attachment_link' => 'Link allegato',
    'attachments_link_url' => 'Link al file',
    'attachments_link_url_hint' => 'Url del sito o del file',
    'attach' => 'Allega',
    'attachments_insert_link' => 'Aggiungi Link Allegato alla Pagina',
    'attachments_edit_file' => 'Modifica File',
    'attachments_edit_file_name' => 'Nome File',
    'attachments_edit_drop_upload' => 'Rilascia file o clicca qui per caricare e sovrascrivere',
    'attachments_order_updated' => 'Ordine allegato aggiornato',
    'attachments_updated_success' => 'Dettagli allegato aggiornati',
    'attachments_deleted' => 'Allegato eliminato',
    'attachments_file_uploaded' => 'File caricato correttamente',
    'attachments_file_updated' => 'File aggiornato correttamente',
    'attachments_link_attached' => 'Link allegato correttamente alla pagina',
    'templates' => 'Template',
    'templates_set_as_template' => 'La pagina è un template',
    'templates_explain_set_as_template' => 'Puoi impostare questa pagina come template in modo che il suo contenuto sia utilizzato quando si creano altre pagine. Gli altri utenti potranno utilizzare questo template se avranno i permessi di visualizzazione per questa pagina.',
    'templates_replace_content' => 'Rimpiazza contenuto della pagina',
    'templates_append_content' => 'Appendi al contenuto della pagina',
    'templates_prepend_content' => 'Prependi al contenuto della pagina',

    // Profile View
    'profile_user_for_x' => 'Utente da :time',
    'profile_created_content' => 'Contenuti Creati',
    'profile_not_created_pages' => ':userName non ha creato pagine',
    'profile_not_created_chapters' => ':userName non ha creato capitoli',
    'profile_not_created_books' => ':userName non ha creato libri',
    'profile_not_created_shelves' => ':userName non ha creato alcuna libreria',

    // Comments
    'comment' => 'Commento',
    'comments' => 'Commenti',
    'comment_add' => 'Aggiungi Commento',
    'comment_placeholder' => 'Scrivi un commento',
    'comment_count' => '{0} Nessun Commento|{1} 1 Commento|[2,*] :count Commenti',
    'comment_save' => 'Salva Commento',
    'comment_new' => 'Nuovo Commento',
    'comment_created' => 'ha commentato :createDiff',
    'comment_updated' => 'Aggiornato :updateDiff da :username',
    'comment_updated_indicator' => 'Aggiornato',
    'comment_deleted_success' => 'Commento eliminato',
    'comment_created_success' => 'Commento aggiunto',
    'comment_updated_success' => 'Commento aggiornato',
    'comment_delete_confirm' => 'Sei sicuro di voler elminare questo commento?',
    'comment_in_reply_to' => 'In risposta a :commentId',
    'comment_editor_explain' => 'Ecco i commenti che sono stati lasciati in questa pagina. I commenti possono essere aggiunti e gestiti quando si visualizza la pagina salvata.',

    // Revision
    'revision_delete_confirm' => 'Sei sicuro di voler eliminare questa revisione?',
    'revision_restore_confirm' => 'Sei sicuro di voler ripristinare questa revisione? Il contenuto della pagina verrà rimpiazzato.',
    'revision_cannot_delete_latest' => 'Impossibile eliminare l\'ultima revisione.',

    // Copy view
    'copy_consider' => 'Per favore, considerate quanto segue quando copiate il contenuto.',
    'copy_consider_permissions' => 'Le impostazioni dei permessi personalizzati non saranno copiate.',
    'copy_consider_owner' => 'Diventerai il proprietario di tutti i contenuti copiati.',
    'copy_consider_images' => 'I file delle immagini delle pagine non saranno duplicati e le immagini originali manterranno la loro relazione con la pagina su cui sono state originariamente caricate.',
    'copy_consider_attachments' => 'Gli allegati della pagina non saranno copiati.',
    'copy_consider_access' => 'Un cambiamento di luogo, di proprietario o di autorizzazioni può far sì che questo contenuto sia accessibile a chi prima non aveva accesso.',

    // Conversions
    'convert_to_shelf' => 'Converti in Libreria',
    'convert_to_shelf_contents_desc' => 'È possibile convertire questo libro in una nuova libreria con gli stessi contenuti. I capitoli contenuti in questo libro saranno convertiti in nuovi libri. Se il libro contiene pagine che non fanno parte di un capitolo, questo libro verrà rinominato e conterrà tali pagine e diventerà parte della nuova libreria.',
    'convert_to_shelf_permissions_desc' => 'Tutti i permessi impostati su questo libro saranno copiati sulla nuova libreria e su tutti i nuovi libri figli che non hanno i loro permessi applicati. Si noti che i permessi delle librerie non si trasmettono automaticamente ai contenuti al loro interno, come avviene per i libri.',
    'convert_book' => 'Converti Libro',
    'convert_book_confirm' => 'Sei sicuro di voler convertire questo libro?',
    'convert_undo_warning' => 'Questo non può essere annullato con la stessa facilità.',
    'convert_to_book' => 'Converti in libro',
    'convert_to_book_desc' => 'È possibile convertire questo capitolo in un nuovo libro con gli stessi contenuti. Tutti i permessi impostati su questo capitolo saranno copiati nel nuovo libro, ma i permessi ereditati dal libro principale non saranno copiati, il che potrebbe portare a una modifica del controllo degli accessi.',
    'convert_chapter' => 'Converti Capitolo',
    'convert_chapter_confirm' => 'Sei sicuro di voler convertire questo capitolo?',

    // References
    'references' => 'Riferimenti',
    'references_none' => 'Non ci sono riferimenti tracciati a questa voce.',
    'references_to_desc' => 'Di seguito sono riportate tutte le pagine conosciute nel sistema che collegano a questo elemento.',

    // Watch Options
    'watch' => 'Osserva',
    'watch_title_default' => 'Preferenze Predefinite',
    'watch_desc_default' => 'Ripristina la visualizzazione delle tue preferenze di notifica predefinite.',
    'watch_title_ignore' => 'Ignora',
    'watch_desc_ignore' => 'Ignora tutte le notifiche, comprese quelle dalle preferenze di livello utente.',
    'watch_title_new' => 'Nuove Pagine',
    'watch_desc_new' => 'Notifica quando viene creata una nuova pagina all\'interno di questo elemento.',
    'watch_title_updates' => 'Tutti Gli Aggiornamenti Della Pagina',
    'watch_desc_updates' => 'Notificare su tutte le nuove pagine e modifiche di pagina.',
    'watch_desc_updates_page' => 'Notifica su tutte le modifiche alla pagina.',
    'watch_title_comments' => 'Tutti Gli Aggiornamenti Della Pagina E Commenti',
    'watch_desc_comments' => 'Notificare su tutte le nuove pagine, modifiche di pagina e nuovi commenti.',
    'watch_desc_comments_page' => 'Notificare le modifiche alla pagina e i nuovi commenti.',
    'watch_change_default' => 'Modifica le preferenze di notifica predefinite',
    'watch_detail_ignore' => 'Ignorare le notifiche',
    'watch_detail_new' => 'In attesa di nuove pagine',
    'watch_detail_updates' => 'Osservare le nuove pagine e gli aggiornamenti',
    'watch_detail_comments' => 'Osservare le nuove pagine, aggiornamenti e commenti',
    'watch_detail_parent_book' => 'Osservare tramite il libro madre',
    'watch_detail_parent_book_ignore' => 'Ignorato tramite il libro madre',
    'watch_detail_parent_chapter' => 'Osservare tramite il capitolo madre',
    'watch_detail_parent_chapter_ignore' => 'Ignorato tramite il capitolo madre',
];
