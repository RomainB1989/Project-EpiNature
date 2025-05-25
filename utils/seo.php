<?php

function getSeoData(string $pageName): array {
    $seoConfig = [
        'accueil' => [
            'title' => "L'EpiNature - Boulangerie Bio Artisanale & Locale",
            'description' => "Découvrez L'EpiNature, votre boulangerie bio artisanale locale. Commandez en ligne et savourez nos pains et pâtisseries frais, 100% naturels.",
        ],
        'account' => [
            'title' => 'Mon Compte - Gestion de vos informations personnelles',
            'description' => 'Gérez facilement vos informations personnelles, commandes et préférences dans votre espace utilisateur sécurisé.',
        ],
        'account/infos' => [
            'title' => 'Mes Informations - Espace Utilisateur',
            'description' => 'Consultez et modifiez vos informations personnelles pour une expérience personnalisée et sécurisée sur notre site.',
        ],
        'connexion' => [
            'title' => 'Connexion - Accédez à votre espace utilisateur',
            'description' => 'Connectez-vous rapidement à votre espace utilisateur pour suivre vos commandes et profiter de nos offres exclusives.',
        ],
        'contact' => [
            'title' => 'Contactez la Coopérative - Assistance & Informations',
            'description' => 'Besoin d’aide ou d’informations ? Contactez notre équipe pour un service réactif et personnalisé.',
        ],
        'cguv' => [
            'title' => 'Conditions Générales d’Utilisation et de Vente',
            'description' => 'Consultez nos conditions générales d’utilisation et de vente pour une transparence totale et une confiance mutuelle.',
        ],
        'mentions-legales' => [
            'title' => 'Mentions Légales - Informations légales du site',
            'description' => 'Retrouvez toutes les informations légales concernant notre site et notre coopérative, conformément à la réglementation.',
        ],
        'ou-nous-trouver' => [
            'title' => 'Où Nous Trouver - Points de Vente & Collecte',
            'description' => 'Découvrez tous nos points de vente et lieux de collecte pour retirer vos commandes près de chez vous.',
        ],
        'partenaires' => [
            'title' => 'Nos Partenaires - Collaboration & Engagement Local',
            'description' => 'Découvrez nos partenaires locaux engagés dans la qualité et le développement durable de notre coopérative.',
        ],
        'presentation' => [
            'title' => 'Présentation de la Coopérative - Notre Histoire & Valeurs',
            'description' => 'Apprenez-en plus sur notre coopérative, ses valeurs artisanales et son engagement pour un pain de qualité.',
        ],
        'creation' => [
            'title' => 'Créez Votre Compte - Rejoignez Notre Communauté',
            'description' => 'Inscrivez-vous facilement pour profiter de nos services, commander en ligne et suivre vos commandes en toute simplicité.',
        ],
        'boutique' => [
            'title' => 'Boutique en Ligne - Pains & Pâtisseries Bio Artisanales',
            'description' => 'Parcourez notre boutique en ligne et commandez vos produits frais à retirer dans nos points de collecte.',
        ],
        'produit' => [
            'title' => 'Détail Produit - Qualité Bio Artisanale & Ingrédients Naturels',
            'description' => 'Découvrez le détail de nos produits, leurs ingrédients naturels et nos méthodes artisanales respectueuses du goût.',
        ],
        'validation-commande' => [
            'title' => 'Validation de Commande - Finalisez votre achat en toute simplicité',
            'description' => 'Complétez les différentes étapes pour valider votre commande et profiter de nos produits bio artisanaux.',
        ],
        'historique-commande' => [
            'title' => 'Historique des Commandes - Suivi et Gestion',
            'description' => 'Consultez l’historique complet de vos commandes passées, suivez leur statut et gérez facilement vos achats.',
        ],
    ];

    // Valeurs par défaut si la page n’est pas trouvée
    return $seoConfig[$pageName] ?? [
        'title' => "L'EpiNature - Coopérative Boulangerie Bio Artisanale",
        'description' => 'Découvrez nos produits bio artisanaux et notre engagement pour un pain de qualité, fabriqué localement avec passion.',
    ];
}
?>