import React from "react";
import { Title } from "../../components/UI/Title";

export const TOS: React.FC = () => (
  <div className="TOS">
    <Title>Conditions d&apos;utilisation</Title>
    <h2>Objectif du site</h2>
    <p>
      Cette plateforme a pour but de fournir une interface permettant le choix
      des vœux des enseignants et vacataires concernant les cours qu’ils
      souhaitent encadrer au cours de l’année suivante au département
      informatique de l’IUT de l’URCA. Ces vœux sont émis à but de communication
      entre l’administration du département et les enseignants, ils ne sont pas
      définitifs et l’administration s’en servira pour établir les emplois du
      temps finaux.
    </p>
    <h2>Informations personnelles et identifiants</h2>
    <p>
      Les identifiants de connexion aux comptes sont fournis par
      l’administration et doivent rester confidentiels. L’utilisateur peut être
      amené à renseigner des informations de contact afin de facilité la
      communication. Ces informations ne seront partagées qu’au sein de la
      direction de l’IUT. Également, l’utilisateur a la possibilité de demander
      l’accès à ses données dans son espace personnel.
    </p>
    <h2>Propriété intellectuelle</h2>
    <p>
      Tous les éléments de ce site sont protégés par le droit à la propriété
      intellectuelle. Leur utilisation sans le consentement de l’IUT est
      interdite. Les informations figurant sur le site sont uniquement
      disponibles à des fins de consultation par les utilisateurs, à défaut d’un
      accord préalable et exprès. Toute utilisation totale ou partielle du site
      ou de son contenu, par quelque procédé que ce soit ou sur quelque support
      que ce soit, à des fins commerciales ou publicitaires, est interdite et
      engage la responsabilité de l’utilisateur.
    </p>
  </div>
);
