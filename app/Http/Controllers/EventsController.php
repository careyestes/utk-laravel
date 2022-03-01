<?php namespace App\Http\Controllers;

class EventsController extends Controller {

	/********************************************************************/
	/*
	 Frontend methods
	/*
	/********************************************************************/

	public function getAllEvents()
	{
		$events = CalendarEvent::GetThisWeek()->get();
		// var_dump($events);die;
    return View::make('frontend/event/events')->with('events', $events);

	}

	public function showEvent($slug) {
		$event = CalendarEvent::whereSlug($slug)->first();
		$eventId = $event->id;
		$location = Location::find($event->location_id);
		$categoriesRel = EventCategoriesRel::where('event_id', '=', $eventId)->get();
		$categories = array();
		foreach($categoriesRel as $categoryRel) {
			$selectedCategory = EventCategories::find($categoryRel->category_id);
			$categories[] = $selectedCategory;
		}

		$eventVars = array('event' => $event, 'categories' => $categories, 'location' => $location);

		return View::make('frontend/event/showEvent')->with($eventVars);
	}


	/********************************************************************/
	/*
	 CMS Methods
	/*
	/********************************************************************/

	public function showAllEvents() {
		$events = CalendarEvent::orderBy('id', 'desc')->paginate(25);
		return View::make('cms/events/viewEvents')->with('events' , $events);
	}

	public function editEvent($id = null) {

		$event = CalendarEvent::firstOrNew(array('id' => $id));
		$categories = EventCategories::alphabetize()->get();
		$locations = Location::alphabetize()->get();
		$locationArray = array();
		foreach ($locations as $value) {
			$locationArray[$value->id] = $value->name;
		}
		$arrayVars = array('event' => $event, 'categories' => $categories, 'locationArray' => $locationArray);
		return View::make('cms/events/editEvent')->with($arrayVars);

	}

	public function newEvent() {
		$event = new CalendarEvent;

		if (Request::isMethod('post')) {
			// First, save Event table data
			$event->title  = Input::get('title');
			$event->slug  = Input::get('slug');
			$event->description  = Input::get('description');
			$event->start_date  = Input::get('start_date');
			$event->end_date  = Input::get('end_date');
			$event->start_time  = Input::get('start_time');
			$event->end_time  = Input::get('end_time');
			$event->contact_name  = Input::get('contact_name');
			$event->contact_email = Input::get('contact_email');
			$event->contact_phone = Input::get('contact_phone');
			$event->contact_url = Input::get('contact_url');
			$event->location_id = Input::get('location_id');
			$event->is_approved = Input::get('is_approved');
			$event->is_published = Input::get('is_published');
			$event->created_at = Input::get('created_at');
			$event->updated_at = Input::get('updated_at');
			$event->save();

			

			// Now save the new batch to key rel table for categories
			$checkedCategories = Input::get('categories');
			if($checkedCategories) {
				foreach($checkedCategories as $value) {
					if($id) {
						$catExists = EventCategoriesRel::where('event_id', '=', $id)->where('category_id', '=', $value)->first();
					}
					if(is_null($catExists)) {
						$eventCategoryRel = new EventCategoriesRel;
						$eventCategoryRel->event_id = $id;
						$eventCategoryRel->category_id = $value;
						$eventCategoryRel->save();
					}
				}
			}
		} 

		return Redirect::route('editEvent', array('id' => $event->id));
	}

	public function updateEvent($id) {

		$event = CalendarEvent::find($id);

		if (Request::isMethod('post')) {
			// First, save Event table data
			$event->title  = Input::get('title');
			$event->slug  = Input::get('slug');
			$event->description  = Input::get('description');
			$event->start_date  = Input::get('start_date');
			$event->end_date  = Input::get('end_date');
			$event->start_time  = Input::get('start_time');
			$event->end_time  = Input::get('end_time');
			$event->contact_name  = Input::get('contact_name');
			$event->contact_email = Input::get('contact_email');
			$event->contact_phone = Input::get('contact_phone');
			$event->contact_url = Input::get('contact_url');
			$event->location_id = Input::get('location_id');
			$event->is_approved = Input::get('is_approved');
			$event->is_published = Input::get('is_published');
			$event->created_at = Input::get('created_at');
			$event->updated_at = Input::get('updated_at');
			$event->save();

			// Clear all records with the event id attached to re-assign
			$attachedEvents = EventCategoriesRel::where('event_id', '=', $id)->delete();

			// Now save the new batch to key rel table for categories
			$checkedCategories = Input::get('categories');
			if($checkedCategories) {
				foreach($checkedCategories as $value) {
					$catExists = EventCategoriesRel::where('event_id', '=', $id)->where('category_id', '=', $value)->first();
					if(is_null($catExists)) {
						$eventCategoryRel = new EventCategoriesRel;
						$eventCategoryRel->event_id = $id;
						$eventCategoryRel->category_id = $value;
						$eventCategoryRel->save();
					}
				}
			}
			
		} 
		
		return Redirect::route('editEvent', array('id' => $id));

	}

	public function deleteEvent($id) {
		
		$event = CalendarEvent::destroy($id);

		if($event) {
			return Redirect::route('showEvents')->with('message', '<p class="alert approved">Event Deleted</p>');
		} else {
			return Redirect::route('showEvents')->with('message', '<p class="alert denied">Something went wrong. The event was not deleted. </p>');
		}

	}

}
