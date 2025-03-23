
import React from 'react';
import { Link } from 'react-router-dom';
import { 
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator 
} from "@/components/ui/breadcrumb";
import { ChevronRight, CalendarDays } from "lucide-react";

const Biography = () => {
  return (
    <div className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      {/* Breadcrumb */}
      <div className="max-w-7xl mx-auto pt-8 px-4 sm:px-6 lg:px-8">
        <Breadcrumb>
          <BreadcrumbList>
            <BreadcrumbItem>
              <BreadcrumbLink as={Link} to="/">Strona Główna</BreadcrumbLink>
            </BreadcrumbItem>
            <BreadcrumbSeparator>
              <ChevronRight className="h-4 w-4" />
            </BreadcrumbSeparator>
            <BreadcrumbItem>
              <BreadcrumbPage>Biografia</BreadcrumbPage>
            </BreadcrumbItem>
          </BreadcrumbList>
        </Breadcrumb>
      </div>

      {/* Biography Content */}
      <div className="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-12">
          <h1 className="text-4xl font-bold text-gray-900 sm:text-5xl mb-4">
            Roman Maciejewski - Biografia
          </h1>
          <p className="text-xl text-gray-600">
            Życie i twórczość jednego z najwybitniejszych kompozytorów polskich XX wieku
          </p>
        </div>

        <div className="prose prose-lg prose-blue mx-auto">
          <div className="mb-12 flex justify-center">
            <div className="bg-gray-200 w-64 h-80 rounded-lg flex items-center justify-center mb-4">
              {/* Placeholder for photo - replace with actual image later */}
              <span className="text-gray-400 text-sm">Zdjęcie kompozytora</span>
            </div>
          </div>

          <h2 className="text-2xl font-bold text-blue-700 mt-8 mb-4">Wczesne lata (1910-1930)</h2>
          <p>
            Roman Maciejewski urodził się 28 lutego 1910 roku w Berlinie, gdzie jego ojciec, Józef Maciejewski, 
            pracował jako organista i dyrygent chóru. Rodzina wróciła do Polski po I wojnie światowej, 
            osiedlając się w Lesznie. Tam młody Roman rozpoczął naukę muzyki pod kierunkiem swojego ojca.
          </p>
          <p>
            W 1924 roku Maciejewski rozpoczął studia w Konserwatorium Muzycznym w Poznaniu. 
            Uczył się tam fortepianu pod kierunkiem Bohdana Zaleskiego oraz teorii i kompozycji 
            u Stanisława Wiechowicza. Już podczas studiów wyróżniał się niezwykłym talentem, 
            zarówno jako pianista, jak i kompozytor.
          </p>

          <h2 className="text-2xl font-bold text-blue-700 mt-8 mb-4">Okres warszawski i pierwsze sukcesy (1930-1934)</h2>
          <p>
            Po ukończeniu studiów w Poznaniu, Maciejewski kontynuował naukę w Warszawie pod kierunkiem 
            Kazimierza Sikorskiego. W tym czasie skomponował swoje pierwsze znaczące dzieła, w tym 
            Mazurki na fortepian, które zyskały uznanie krytyków. Utwory te, inspirowane folklorem polskim, 
            pokazywały już oryginalne podejście kompozytora do tradycyjnych form muzycznych.
          </p>

          <h2 className="text-2xl font-bold text-blue-700 mt-8 mb-4">Lata podróży (1934-1951)</h2>
          <p>
            Po powrocie z Paryża, Maciejewski nie osiadł na stałe w Polsce. Rozpoczął okres intensywnych 
            podróży, koncertując jako pianista i prezentując swoje kompozycje w różnych krajach Europy. 
            W 1934 roku wyjechał do Londynu, gdzie jego utwory zyskały uznanie publiczności.
          </p>
        </div>

        {/* Timeline */}
        <div className="mt-16 bg-gray-50 p-6 rounded-xl">
          <h2 className="text-2xl font-bold text-center mb-8">Kalendarium życia</h2>
          <div className="space-y-6">
            {[
              { year: "1910", title: "Narodziny w Berlinie", desc: "Roman Maciejewski przychodzi na świat 28 lutego w Berlinie" },
              { year: "1924-1930", title: "Studia w Poznaniu", desc: "Nauka w Konserwatorium Muzycznym w Poznaniu" },
              { year: "1930-1934", title: "Okres warszawski i paryski", desc: "Studia w Warszawie i Paryżu, pierwsze znaczące kompozycje" },
              { year: "1934-1951", title: "Okres szwedzki", desc: "Pobyt w Szwecji, rozpoczęcie pracy nad 'Requiem'" },
              { year: "1951-1977", title: "Okres amerykański", desc: "Pobyt w USA, ukończenie i premiera 'Requiem' (1960)" },
              { year: "1977-1998", title: "Powrót do Europy", desc: "Osiedlenie się w Göteborg, ostatnie kompozycje" },
              { year: "1998", title: "Śmierć kompozytora", desc: "Roman Maciejewski umiera 30 kwietnia w Göteborg" }
            ].map((item, index) => (
              <div key={index} className="flex items-start">
                <div className="flex-shrink-0 w-24 font-bold text-blue-600">
                  {item.year}
                </div>
                <div className="flex-shrink-0 ml-4 mr-4">
                  <div className="h-4 w-4 rounded-full bg-blue-600 mt-1.5"></div>
                </div>
                <div>
                  <h3 className="font-semibold">{item.title}</h3>
                  <p className="text-gray-600">{item.desc}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
};

export default Biography;
