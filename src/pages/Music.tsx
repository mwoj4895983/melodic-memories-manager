
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
import { ChevronRight, Music as MusicIcon, Play, Headphones } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";

const Music = () => {
  // Sample music data
  const musicWorks = [
    {
      id: 1,
      title: "Requiem",
      year: "1959",
      description: "Monumentalne dzieło będące odpowiedzią na tragedię II wojny światowej.",
      duration: "120 min"
    },
    {
      id: 2,
      title: "Mazurki",
      year: "1930-1932",
      description: "Inspirowane folklorem polskie tańce, pełne charakterystycznych rytmów.",
      duration: "45 min"
    },
    {
      id: 3,
      title: "Pieśni Kurpiowskie",
      year: "1935",
      description: "Zbiór utworów wokalnych opartych na muzyce regionu kurpiowskiego.",
      duration: "30 min"
    },
    {
      id: 4,
      title: "Koncert fortepianowy",
      year: "1936",
      description: "Wirtuozowski utwór z elementami jazzowymi.",
      duration: "35 min"
    },
    {
      id: 5,
      title: "Missa Brevis",
      year: "1945",
      description: "Krótka forma mszalna, pełna duchowej głębi.",
      duration: "25 min"
    },
    {
      id: 6,
      title: "Etiudy",
      year: "1927-1932",
      description: "Zbiór utworów wirtuozowskich na fortepian.",
      duration: "40 min"
    }
  ];

  return (
    <div className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      {/* Breadcrumb */}
      <div className="max-w-7xl mx-auto pt-8 px-4 sm:px-6 lg:px-8">
        <Breadcrumb>
          <BreadcrumbList>
            <BreadcrumbItem>
              <BreadcrumbLink asChild>
                <Link to="/">Strona Główna</Link>
              </BreadcrumbLink>
            </BreadcrumbItem>
            <BreadcrumbSeparator>
              <ChevronRight className="h-4 w-4" />
            </BreadcrumbSeparator>
            <BreadcrumbItem>
              <BreadcrumbPage>Muzyka</BreadcrumbPage>
            </BreadcrumbItem>
          </BreadcrumbList>
        </Breadcrumb>
      </div>

      {/* Music Content */}
      <div className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-12">
          <h1 className="text-4xl font-bold text-gray-900 sm:text-5xl mb-4">
            Dzieła Muzyczne
          </h1>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto">
            Odkryj bogactwo kompozycji Romana Maciejewskiego, od intymnych mazurków po monumentalne Requiem
          </p>
        </div>

        {/* Featured Work */}
        <div className="bg-white shadow-xl rounded-lg overflow-hidden mb-16">
          <div className="md:flex">
            <div className="md:flex-shrink-0 bg-gray-200 md:w-96 flex items-center justify-center p-8">
              <MusicIcon className="h-32 w-32 text-blue-500" />
            </div>
            <div className="p-8">
              <div className="uppercase tracking-wide text-sm text-blue-500 font-semibold">Requiem (1959)</div>
              <h2 className="mt-2 text-2xl font-semibold">Najważniejsze dzieło życia</h2>
              <p className="mt-4 text-gray-600">
                "Requiem" Romana Maciejewskiego to monumentalne dzieło, nad którym kompozytor pracował ponad 15 lat. 
                Ta dwugodzinna kompozycja na cztery głosy solowe, dwa chóry i dwie orkiestry symfoniczne, 
                powstała jako muzyczna odpowiedź na tragedię II wojny światowej i jest uważana za 
                najważniejsze dzieło w dorobku kompozytora.
              </p>
              <div className="mt-6">
                <Button className="flex items-center gap-2 bg-blue-600 hover:bg-blue-700">
                  <Headphones className="h-5 w-5" />
                  Posłuchaj fragmentu
                </Button>
              </div>
            </div>
          </div>
        </div>

        {/* All Works */}
        <h2 className="text-3xl font-bold mb-8">Wszystkie kompozycje</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {musicWorks.map((work) => (
            <Card key={work.id} className="hover:shadow-md transition-shadow">
              <CardHeader>
                <CardTitle>{work.title}</CardTitle>
                <CardDescription>{work.year}</CardDescription>
              </CardHeader>
              <CardContent>
                <p>{work.description}</p>
                <div className="mt-4 text-sm text-gray-500">
                  Czas trwania: {work.duration}
                </div>
              </CardContent>
              <CardFooter>
                <Button variant="outline" className="w-full flex items-center justify-center gap-2">
                  <Play className="h-4 w-4" /> Posłuchaj
                </Button>
              </CardFooter>
            </Card>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Music;
