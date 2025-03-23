
import React from 'react';
import { Link } from 'react-router-dom';
import { Button } from "@/components/ui/button";
import { Music, User, FileText, Phone } from "lucide-react";

const Index = () => {
  return (
    <div className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      {/* Hero Section */}
      <div className="pt-24 pb-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div className="text-center animate-fade-in">
          <h1 className="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl mb-6">
            Roman Maciejewski
          </h1>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto mb-10">
            Odkryj dziedzictwo jednego z najwybitniejszych polskich kompozytorów XX wieku
          </p>
          <div className="flex flex-wrap justify-center gap-4">
            <Button size="lg" className="bg-blue-600 hover:bg-blue-700">
              <Music className="mr-2 h-5 w-5" />
              Muzyka
            </Button>
            <Button variant="outline" size="lg">
              <FileText className="mr-2 h-5 w-5" />
              Biografia
            </Button>
          </div>
        </div>
      </div>

      {/* Featured Works */}
      <div className="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <h2 className="text-3xl font-bold text-gray-900 mb-12 text-center">Wybitne Dzieła</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {[1, 2, 3].map((item) => (
            <div key={item} className="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
              <div className="aspect-w-16 aspect-h-9 mb-4 bg-gray-100 rounded-lg flex items-center justify-center">
                <Music className="h-12 w-12 text-gray-400" />
              </div>
              <h3 className="text-xl font-semibold mb-2">Requiem</h3>
              <p className="text-gray-600 mb-4">
                Jedno z najważniejszych dzieł w dorobku kompozytora, ukończone w 1959 roku.
              </p>
              <Button variant="outline" className="w-full">Posłuchaj</Button>
            </div>
          ))}
        </div>
      </div>

      {/* Biography Teaser */}
      <div className="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-10">
          <div className="md:w-1/2">
            <h2 className="text-3xl font-bold text-gray-900 mb-6">O Romanie Maciejewskim</h2>
            <p className="text-gray-600 mb-4">
              Roman Maciejewski (1910-1998) był polskim kompozytorem, pianistą i dyrygentem. 
              Jego twórczość obejmuje zarówno utwory orkiestrowe, kameralne, jak i wokalno-instrumentalne.
            </p>
            <p className="text-gray-600 mb-6">
              Studiował w Poznaniu i Warszawie, a następnie w Paryżu pod kierunkiem Nadii Boulanger.
              W swojej twórczości łączył elementy muzyki polskiej z nowoczesnymi technikami kompozytorskimi.
            </p>
            <Button>Pełna Biografia</Button>
          </div>
          <div className="md:w-1/2 bg-gray-200 rounded-xl aspect-w-4 aspect-h-3 flex items-center justify-center">
            <User className="h-16 w-16 text-gray-400" />
          </div>
        </div>
      </div>

      {/* Contact Section */}
      <div className="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <h2 className="text-3xl font-bold text-gray-900 mb-12 text-center">Kontakt</h2>
        <div className="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-8">
          <div className="flex items-center justify-center mb-6">
            <Phone className="h-12 w-12 text-blue-600" />
          </div>
          <p className="text-center text-gray-600 mb-6">
            Masz pytania dotyczące Romana Maciejewskiego lub jego twórczości?
            Skontaktuj się z nami!
          </p>
          <div className="flex justify-center">
            <Button>Strona Kontaktowa</Button>
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-gray-900 text-white py-12 px-4">
        <div className="max-w-7xl mx-auto">
          <div className="flex flex-col md:flex-row justify-between items-center">
            <div className="mb-6 md:mb-0">
              <div className="flex items-center text-xl font-bold">
                <Music className="mr-2 h-5 w-5" />
                Roman Maciejewski
              </div>
              <p className="mt-2 text-gray-400 text-sm">
                © {new Date().getFullYear()} Wszelkie prawa zastrzeżone
              </p>
            </div>
            <div className="flex flex-col sm:flex-row gap-6">
              <Link to="/" className="text-gray-300 hover:text-white">Strona Główna</Link>
              <Link to="/biografia" className="text-gray-300 hover:text-white">Biografia</Link>
              <Link to="/muzyka" className="text-gray-300 hover:text-white">Muzyka</Link>
              <Link to="/kontakt" className="text-gray-300 hover:text-white">Kontakt</Link>
            </div>
            <div className="mt-6 md:mt-0">
              <div className="flex gap-4">
                <Button variant="outline" size="sm">
                  Logowanie
                </Button>
                <Button size="sm">
                  Rejestracja
                </Button>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default Index;
