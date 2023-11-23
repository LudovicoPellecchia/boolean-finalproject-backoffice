<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            [
                "name" => "Security specialist",
                "description" => "I specialisti in sicurezza si concentrano su vari aspetti della cybersecurity per proteggere i dati e i sistemi. Questi professionisti sono responsabili di sviluppare e implementare politiche e soluzioni di sicurezza, monitorare costantemente i sistemi per identificare minacce e rispondere prontamente a incidenti di sicurezza. Gestiscono anche l'analisi dei rischi e valutano le vulnerabilità nei sistemi e nelle reti."
            ],
            [
                "name" => "Vulnerability assessor",
                "description" => "I valutatori di vulnerabilità sono esperti nella scoperta e valutazione delle vulnerabilità nei sistemi e nelle reti. Svolgono test di sicurezza e analisi per identificare potenziali punti deboli e sviluppano soluzioni per mitigare i rischi. Questi professionisti sono fondamentali per garantire che i sistemi siano protetti contro minacce informatiche."
            ],
            [
                "name" => "Security administrator",
                "description" => "Gli amministratori di sicurezza sono responsabili di mantenere e proteggere i sistemi informatici e le reti. Gestiscono politiche di sicurezza, configurano firewall e monitorano costantemente le attività per garantire che i sistemi rimangano sicuri da minacce esterne e interne. La loro funzione è fondamentale per garantire la continuità operativa e la protezione dei dati aziendali."
            ],
            [
                "name" => "Cryptographer",
                "description" => "I criptografi sono esperti nell'uso di algoritmi di crittografia per proteggere i dati da accessi non autorizzati. Sono responsabili della progettazione di sistemi di crittografia sicuri e dell'implementazione di soluzioni di protezione dei dati. Questi professionisti svolgono un ruolo chiave nella protezione delle comunicazioni e dei dati sensibili."
            ],
            [
                "name" => "Security manager",
                "description" => "I responsabili della sicurezza supervisionano le politiche e le procedure di sicurezza all'interno delle organizzazioni. Sono responsabili della gestione delle risorse e delle squadre di sicurezza, nonché della definizione delle strategie per affrontare le minacce emergenti. Garantiscono la conformità alle normative e l'efficacia delle misure di sicurezza aziendali."
            ],
            [
                "name" => "Security analyst",
                "description" => "Gli analisti di sicurezza monitorano e analizzano costantemente le minacce alla sicurezza informatica. Identificano potenziali vulnerabilità e rispondono a incidenti di sicurezza. Svolgono analisi dei rischi e collaborano con altri professionisti per garantire che i sistemi rimangano protetti da minacce esterne e interne."
            ],
            [
                "name" => "Chief information security officer (CISO)",
                "description" => "Il Responsabile della Sicurezza delle Informazioni (CISO) è il massimo dirigente aziendale responsabile della strategia e delle politiche di sicurezza informatica all'interno di un'organizzazione. Supervisiona l'intera strategia di sicurezza, gestisce risorse e personale specializzato e garantisce la protezione dei dati aziendali da minacce interne ed esterne."
            ],
            [
                "name" => "Security architect",
                "description" => "Gli architetti della sicurezza progettano e implementano soluzioni di sicurezza avanzate per proteggere i sistemi e le reti. Sono responsabili della progettazione di infrastrutture di sicurezza, dell'implementazione di controlli e della gestione delle politiche di sicurezza aziendali. Contribuiscono in modo significativo a garantire che i sistemi rimangano protetti da minacce informatiche."
            ],
            [
                "name" => "Malware analyst",
                "description" => "Gli analisti di malware sono esperti nell'analisi e nell'identificazione di software dannoso, tra cui virus, trojan e spyware. Svolgono ricerche approfondite per comprendere il comportamento del malware e sviluppano metodi per rilevarlo e mitigarne gli effetti. Questi professionisti sono fondamentali per proteggere i sistemi da minacce informatiche."
            ],
            [
                "name" => "Consulente di Sicurezza",
                "description" => "I consulenti di sicurezza forniscono consulenza esperta su strategie e soluzioni di sicurezza informatica. Collaborano con le organizzazioni per valutare le loro esigenze di sicurezza, identificare vulnerabilità e proporre soluzioni personalizzate. Svolgono un ruolo chiave nel migliorare la sicurezza delle organizzazioni."
            ],
            [
                "name" => "Security consultant",
                "description" => "Gli ingegneri di sicurezza sono responsabili dell'implementazione di soluzioni di sicurezza informatica. Configurano e gestiscono sistemi di sicurezza, firewall e sistemi di rilevamento delle intrusioni. Lavorano per garantire che i sistemi e le reti rimangano protetti da minacce cibernetiche."
            ],
            [
                "name" => "Security engineer",
                "description" => "Gli architetti di sicurezza sono esperti nella progettazione di soluzioni di sicurezza avanzate per proteggere dati e infrastrutture. Progettano sistemi di sicurezza complessi e sviluppano politiche di sicurezza per organizzazioni. Contribuiscono a garantire che le organizzazioni rimangano sicure da minacce informatiche."
            ],

        ];

        foreach ($specializations as $specialization){
            $newSpecialization = new Specialization();
    
            $newSpecialization->name = $specialization["name"];
            $newSpecialization->description = $specialization["description"];
    
            $newSpecialization->save();
        }
    }


}
