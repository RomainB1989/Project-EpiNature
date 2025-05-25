const contentShoppingPage = [
    {
      title: "Nos Produits",
      content: `Bienvenue dans notre boutique où Marie, Céline, Jérémy, Pauline, Bernard et Dorian unissent leur passion et leur savoir-faire artisanal pour vous proposer chaque jour une large gamme de produits faits maison, alliant qualité, fraîcheur et respect de l’environnement, que ce soit pour nos pains, viennoiseries, gâteaux ou produits salés, afin de vous offrir une expérience gustative authentique et conviviale.`
    },
    {
      title: "Nos Pains",
      content: `De la farine, de l'eau et du sel pour des pains réalisés de manière traditionnelle et artisanale : chaque jour, nos pains sont pétris (à la main pour certains !) et façonnés par Marie, Céline, Jérémy, Pauline, Bernard et Dorian avant d’être cuits au feu de bois, avec des levains naturels et des farines sélectionnées pour garantir des pains nutritifs, digestes et savoureux, dans une démarche de proximité et de qualité respectueuse des critères sociaux et environnementaux.`
    },
    {
      title: "Nos Viennoiseries",
      content: `Marie, Céline, Jérémy, Pauline, Bernard et Dorian préparent chaque matin avec soin nos viennoiseries pur beurre, façonnant à la main croissants, chocolatines, brioches et chaussons aux pommes, qu’ils laissent pousser lentement pour révéler tout leur moelleux et leurs arômes, offrant ainsi à vos petits-déjeuners et goûters une touche de douceur et d’authenticité.`
    },
    {
      title: "Nos Gâteaux",
      content: `Chaque semaine, Marie, Céline, Jérémy, Pauline, Bernard et Dorian mettent leur créativité et leur savoir-faire au service de vos envies sucrées en réalisant de bonnes tartes et gateaux confectionnés avec des ingrédients naturels et locaux, pour des pâtisseries fraîches, raffinées et conviviales, parfaites pour toutes les occasions.`
    },
    {
      title: "Nos Produits Salés",
      content: `Pour vos repas sur le pouce ou vos apéritifs, Marie, Céline, Jérémy, Pauline, Bernard et Dorian préparent chaque jour une sélection de quiches, pizzas, fougasses et tourtes, élaborées à partir de légumes frais, fromages affinés et viandes de qualité, puis cuites au four pour préserver leur moelleux et leur goût authentique, afin de vous offrir des recettes salées variées, nourrissantes et généreuses, adaptées à toutes les envies.`
    }
  ];


  function modifyDomByCategory(value) {
    // Utilise l'index 0 si aucune catégorie n'est sélectionnée, 
    // sinon convertit la valeur en index numérique.
    let index = value === "" ? 0 : parseInt(value, 10);

    // Sécuriser l'accès au tableau
    if (!contentShoppingPage[index]) {
        // Par défaut, afficher la catégorie générale ainsi que tous les produits 
        // puis sortir de la fonction
        document.querySelector('h1').innerText = contentShoppingPage[0].title;
        document.querySelector('.introduction-shopping').innerText = contentShoppingPage[0].content;
        document.querySelectorAll('.product-card').forEach(product => {
            product.style.display = "block";
        });
        return;
    }

    // Afficher le titre et l'introduction de la catégorie sélectionnée
    document.querySelector('h1').innerText = contentShoppingPage[index].title;
    document.querySelector('.introduction-shopping').innerText = contentShoppingPage[index].content;

    // Parcourir chaque produit pour afficher/cacher selon la catégorie
    document.querySelectorAll('.product-card').forEach(product => {
        const productCategory = product.getAttribute('data-category');
        if (value === "" || productCategory === value) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
}